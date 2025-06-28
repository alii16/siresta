<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\Diskusi;

class DiskusiAdminController extends Controller
{

    public function index(Request $request)
    {
        $query = Wisata::with(['diskusi', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->has('diskusi');

        // Filter pencarian
        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        // Filter kategori
        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('kategori', $request->kategori);
        }

        $wisataList = $query->get();

        $kategoriList = Wisata::select('kategori')->distinct()->pluck('kategori');

        return view('admin.diskusi.index', compact('wisataList', 'kategoriList'));
    }

    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);

        // Ambil semua diskusi, group by user
        $diskusiGroup = $wisata->diskusi()
            ->with('user')
            ->get()
            ->groupBy('user_id');

        return view('admin.diskusi.show', compact('wisata', 'diskusiGroup'));
    }


    public function destroy($id)
    {
        $diskusi = Diskusi::findOrFail($id);
        $diskusi->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }

    public function destroyAll($wisataId)
    {
        $wisata = \App\Models\Wisata::findOrFail($wisataId);
        // Hapus semua diskusi (beserta balasan) untuk destinasi ini
        $wisata->diskusi()->delete();

        return back()->with('success', 'Semua diskusi dan komentar pada destinasi ini berhasil dihapus.');
    }
}
