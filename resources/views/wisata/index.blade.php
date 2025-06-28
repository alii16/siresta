@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-gray-600 to-gray-700 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/3">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Ccircle cx="30" cy="30" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center px-3 py-1.5 bg-white/8 backdrop-blur-sm rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Destinasi Wisata Indonesia
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white">
                    Jelajahi Keindahan
                    <span class="block text-gray-200">
                        Nusantara
                    </span>
                </h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed mb-8">
                    Temukan pesona alam Indonesia yang memukau, dari pantai eksotis hingga puncak gunung yang menantang. 
                    Bagikan pengalaman wisata yang tak terlupakan bersama kami.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 max-w-xl mx-auto">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">{{ $wisata->count() }}</div>
                        <div class="text-gray-400 text-sm">Destinasi</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">4.8</div>
                        <div class="text-gray-400 text-sm">Rating</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white">100K+</div>
                        <div class="text-gray-400 text-sm">Pengunjung</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave decoration -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-12 text-gray-50" preserveAspectRatio="none" viewBox="0 0 1200 120" fill="currentColor">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
            </svg>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <!-- Filter Section -->
        @include('wisata.partials.filter-section')

        <!-- Destination Grid -->
        @include('wisata.partials.destination-section')

    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection