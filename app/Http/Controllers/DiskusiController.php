<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi;

class DiskusiController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'wisata_id' => 'required|exists:wisata,id',
            'pesan' => 'required|string',
            'parent_id' => 'nullable|exists:diskusi,id',
        ]);

        $data['user_id'] = auth()->id();

        Diskusi::create($data);

        return back()->with('success', 'Pesan Anda telah dikirim.');
    }
}
