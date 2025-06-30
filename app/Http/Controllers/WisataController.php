<?php

namespace App\Http\Controllers;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');
        $search = $request->query('search');

        $query = Wisata::with('galeri');

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        if ($search) {
        $query->where('nama', 'like', '%' . $search . '%');
        }

        $wisata = $query->latest()->get();

        $kategoriList = Wisata::select('kategori')->distinct()->pluck('kategori');

        return view('wisata.index', compact('wisata', 'kategori', 'kategoriList', 'search'));
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
        $query = Wisata::query();

        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $wisata = $query->with('reviews')->get();

        return view('wisata.partials.grid', compact('wisata'))->render();
    }
}