<?php

namespace App\Http\Controllers;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');

        $query = Wisata::with('galeri');

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $wisata = $query->latest()->get();

        return view('wisata.index', compact('wisata', 'kategori'));
    }
    public function show($id)
    {
        $wisata = \App\Models\Wisata::findOrFail($id);
        $reviews = $wisata->reviews ?? collect();
        $diskusi = $wisata->diskusi()->whereNull('parent_id')->with(['anak.user', 'user'])->get();


        $averageRating = $reviews->count() > 0 ? round($reviews->avg('rating'), 1) : null;
        $reviewCount = $reviews->count();

        return view('wisata.show', compact('wisata', 'reviews', 'diskusi', 'averageRating', 'reviewCount'));
    }
    
    public function filter(Request $request)
    {
        $kategori = $request->kategori;
        $wisata = \App\Models\Wisata::when($kategori, function($q) use ($kategori) {
            $q->where('kategori', $kategori);
        })->with('reviews')->get();

        // Kembalikan view partial saja
        return view('wisata.partials.grid', compact('wisata'))->render();
    }
}
