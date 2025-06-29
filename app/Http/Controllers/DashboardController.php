<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Diskusi;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $totalWisata = Wisata::count();
            $totalReview = Review::count();
            $totalDiskusi = Wisata::has('diskusi')->count();

            // Data untuk chart: Diskusi per bulan (12 bulan terakhir)
            $diskusiPerBulan = Diskusi::selectRaw('YEAR(created_at) as tahun, MONTH(created_at) as bulan, COUNT(*) as total')
                ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
                ->groupBy('tahun', 'bulan')
                ->orderBy('tahun')
                ->orderBy('bulan')
                ->get();

            $bulanLabels = [];
            $diskusiData = [];
            for ($i = 11; $i >= 0; $i--) {
                $date = now()->subMonths($i);
                $label = $date->format('M Y');
                $bulanLabels[] = $label;
                $found = $diskusiPerBulan->firstWhere(fn($d) => $d->bulan == $date->month && $d->tahun == $date->year);
                $diskusiData[] = $found ? $found->total : 0;
            }

            // Wisata dengan review terbanyak (top 5)
            $wisataReview = Wisata::withCount('reviews')
                ->orderByDesc('reviews_count')
                ->take(5)
                ->get();
            $wisataLabels = $wisataReview->pluck('nama')->toArray();
            $wisataData = $wisataReview->pluck('reviews_count')->toArray();

            // Komposisi user
            $userRoleLabels = ['Admin', 'User'];
            $userRoleData = [
                User::where('role', 'admin')->count(),
                User::where('role', 'user')->count(),
            ];

            return view('dashboard', compact(
                'totalWisata',
                'totalReview',
                'totalDiskusi',
                'bulanLabels',
                'diskusiData',
                'wisataLabels',
                'wisataData',
                'userRoleLabels',
                'userRoleData'
            ));
        }

        return view('dashboard');
    }
}