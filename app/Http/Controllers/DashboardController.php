<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Diskusi;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $totalWisata = Wisata::count();
            $totalReview = Review::count();

            // Hanya wisata yang punya setidaknya satu diskusi
            $totalDiskusi = Wisata::has('diskusi')->count();

            return view('dashboard', compact('totalWisata', 'totalReview', 'totalDiskusi'));
        }

        return view('dashboard');
    }
}