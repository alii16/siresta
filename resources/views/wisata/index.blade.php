@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gwhite">
    <!-- Hero Section -->
    <div class="bg-white border-b border-gray-200" style="background-image: url('img/hero-header.jpg'); background-size: cover; background-position: center; height: fit-content;">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Destinasi Wisata Indonesia
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    Jelajahi Keindahan Nusantara
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                    Temukan pesona alam Indonesia yang memukau, dari pantai eksotis hingga puncak gunung yang menantang. 
                    Bagikan pengalaman wisata yang tak terlupakan.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-8 max-w-md mx-auto">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ $wisata->count() }}</div>
                        <div class="text-gray-500 text-sm">Destinasi</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">4.8</div>
                        <div class="text-gray-500 text-sm">Rating</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">100K+</div>
                        <div class="text-gray-500 text-sm">Pengunjung</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <!-- Filter Section -->
        @include('wisata.partials.filter-section')

        <!-- Destination Grid -->
        @include('wisata.partials.destination-section')
    </div>
</div>
@endsection