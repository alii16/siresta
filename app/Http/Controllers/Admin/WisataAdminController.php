<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\GaleriWisata;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class WisataAdminController extends Controller
{

    public function index(Request $request)
    {
        $query = \App\Models\Wisata::query();

        // Filter pencarian
        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        // Filter kategori
        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('kategori', $request->kategori);
        }

        $wisata = $query
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->get();

        $ratingTertinggi = Review::orderByDesc('rating')->first();

        // Ambil kategori unik dari database
        $kategoriList = \App\Models\Wisata::select('kategori')->distinct()->pluck('kategori');

        return view('admin.wisata.index', compact('wisata', 'kategoriList', 'ratingTertinggi'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'kategori' => 'required|string',
            'jam_buka' => 'required|string',
            'harga_tiket' => 'required|numeric',
            'maps_embed' => 'nullable|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'galeri.*' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Simpan foto utama
        $data['foto'] = $request->file('foto')->store('galeri', 'public');

        // Simpan data wisata
        $wisata = Wisata::create($data);

        // Simpan galeri jika ada
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $foto) {
                $path = $foto->store('galeri', 'public');
                GaleriWisata::create([
                    'wisata_id' => $wisata->id,
                    'foto' => $path,
                ]);
            }
        }

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil ditambahkan.');
    }

    public function edit(Wisata $wisatum)
    {
        return view('admin.wisata.edit', compact('wisatum'));
    }

    public function update(Request $request, Wisata $wisatum)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'kategori' => 'required|string',
            'jam_buka' => 'required|string',
            'harga_tiket' => 'required|numeric',
            'maps_embed' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'galeri.*' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Ganti foto utama jika diunggah
        if ($request->hasFile('foto')) {
            if ($wisatum->foto && Storage::disk('public')->exists($wisatum->foto)) {
                Storage::disk('public')->delete($wisatum->foto);
            }

            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $wisatum->update($data);

        // Tambah galeri baru
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $foto) {
                $path = $foto->store('galeri', 'public');
                GaleriWisata::create([
                    'wisata_id' => $wisatum->id,
                    'foto' => $path,
                ]);
            }
        }

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil diperbarui.');
    }

    public function destroy(Wisata $wisatum)
    {
        // Hapus foto utama
        if ($wisatum->foto && Storage::disk('public')->exists($wisatum->foto)) {
            Storage::disk('public')->delete($wisatum->foto);
        }

        // Hapus galeri terkait
        foreach ($wisatum->galeri as $foto) {
            if ($foto->foto && Storage::disk('public')->exists($foto->foto)) {
                Storage::disk('public')->delete($foto->foto);
            }
            $foto->delete();
        }

        $wisatum->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Data berhasil dihapus.');
    }
}
