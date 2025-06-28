<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'wisata_id' => 'required|exists:wisata,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();

        Review::create($data);

        return back()->with('success', 'Terima kasih atas review Anda!');
    }
}
