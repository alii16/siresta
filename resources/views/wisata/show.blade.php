@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Hero Image Section -->
    <div class="relative h-96 overflow-hidden">
        <img src="{{ asset('storage/' . $wisata->foto) }}" 
             alt="{{ $wisata->nama }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
        
        <!-- Back Button -->
        <div class="absolute top-6 left-6">
            <a href="{{ route('wisata.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-white/90 hover:bg-white text-gray-900 font-medium rounded-lg backdrop-blur-sm transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Title Overlay -->
        <div class="absolute bottom-6 left-6 text-white">
            <h1 class="text-4xl font-bold mb-2">{{ $wisata->nama }}</h1>
            <div class="flex items-center space-x-4 text-white/90">
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $wisata->lokasi }}
                </span>
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    {{ number_format($averageRating, 1) }} ({{ $reviewCount }} ulasan)
                </span>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Information Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    @include('wisata.partials.show.information-section')
                </div>

                <!-- Gallery Section -->
                @if ($wisata->galeri->count())
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        @include('wisata.partials.show.gallery-section')
                    </div>
                @endif

                <!-- Map Section -->
                @if ($wisata->maps_embed)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            Lokasi di Peta
                        </h2>
                        <div class="aspect-video w-full overflow-hidden rounded-lg">
                            <iframe src="{{ $wisata->maps_embed }}" 
                                    width="100%" 
                                    height="100%" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column - Reviews & Discussion -->
            <div class="space-y-8">
                <!-- Rating Summary -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    @include('wisata.partials.show.rating-section')
                </div>

                <!-- Reviews List -->
                @if($wisata->reviews->count() > 0)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        @include('wisata.partials.show.review-section')
                    </div>
                @endif
            </div>
        </div>

        <!-- Discussion Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mt-8">
            @include('wisata.partials.show.diskusi-section')
        </div>
    </div>
</div>
    @if (session('status') === 'succes')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Profil berhasil diperbarui.',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: `{!! implode('<br>', $errors->all()) !!}`,
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                });
            });
        </script>
    @endif
@endsection