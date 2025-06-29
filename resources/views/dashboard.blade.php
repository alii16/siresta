@extends('layouts.app')


@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <div class="flex items-center gap-4">
                @if(Auth::user()->foto_profil)
                    <img src="{{ asset('storage/foto_profil/' . Auth::user()->foto_profil) }}" alt="Foto Profil"
                        class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover border-4 border-white shadow-md transition-all duration-200">
                @else
                    <div
                        class="w-24 h-24 md:w-32 md:h-32 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-4xl md:text-7xl mr-2">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h2>
                    <p class="text-sm text-gray-600">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        @if(Auth::user()->role === 'admin')
            <!-- Admin Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Wisata Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Tempat Wisata</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalWisata ?? 0 }}</p>
                            <p class="text-sm text-green-600 mt-1">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                Aktif
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Review Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Review</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalReview ?? 0 }}</p>
                            <p class="text-sm text-yellow-600 mt-1">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                Rating
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Diskusi Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Diskusi</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalDiskusi ?? 0 }}</p>
                            <p class="text-sm text-green-600 mt-1">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                Diskusi
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Line Chart: Diskusi Bulanan -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col">
                    <h4 class="font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17l6-6 4 4 8-8" />
                        </svg>
                        Tren Diskusi Bulanan
                    </h4>
                    <div id="apex-diskusi" style="height: 240px;"></div>
                </div>
                <!-- Pie Chart: Wisata Review Terbanyak -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col">
                    <h4 class="font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3v10l6 6" />
                        </svg>
                        Wisata Paling Populer
                    </h4>
                    <div id="apex-wisata" style="height: 240px;"></div>
                </div>
                <!-- Donut Chart: Komposisi User -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col">
                    <h4 class="font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                        </svg>
                        Komposisi User
                    </h4>
                    <div id="apex-user" style="height: 240px;"></div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Menu Admin</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('admin.wisata.index') }}"
                        class="group flex items-center p-4 bg-gray-50 rounded-lg border border-gray-200 hover:bg-blue-50 hover:border-blue-200 transition-all duration-200">
                        <div
                            class="w-10 h-10 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 group-hover:text-blue-600">Kelola Tempat Wisata</h4>
                            <p class="text-sm text-gray-500">Tambah, edit, dan hapus destinasi wisata</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 ml-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <a href="{{ route('admin.diskusi.index') }}"
                        class="group flex items-center p-4 bg-gray-50 rounded-lg border border-gray-200 hover:bg-green-50 hover:border-green-200 transition-all duration-200">
                        <div
                            class="w-10 h-10 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 group-hover:text-green-600">Kelola Forum Diskusi</h4>
                            <p class="text-sm text-gray-500">Moderasi dan kelola diskusi pengguna</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 ml-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @else
            <!-- User Dashboard -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Jelajahi Destinasi Wisata</h3>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">
                    Temukan tempat wisata menarik, baca ulasan dari pengunjung lain, dan berbagi pengalaman Anda.
                </p>
                <a href="{{ route('wisata.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                    Lihat Daftar Tempat Wisata
                </a>
            </div>
        @endif
    </div>
@endsection
@if(Auth::user()->role === 'admin')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Line Chart: Diskusi Bulanan
    var optionsDiskusi = {
        chart: { type: 'line', height: 240, toolbar: { show: false } },
        series: [{
            name: 'Diskusi',
            data: @json($diskusiData)
        }],
        xaxis: { categories: @json($bulanLabels) },
        colors: ['#2563eb'],
        stroke: { curve: 'smooth', width: 3 },
        fill: { type: 'gradient', gradient: { shade: 'light', type: "vertical", shadeIntensity: 0.5, gradientToColors: ['#60a5fa'], inverseColors: false, opacityFrom: 0.7, opacityTo: 0.2, stops: [0, 100] } },
        markers: { size: 5, colors: ['#fff'], strokeColors: '#2563eb', strokeWidth: 3 },
        grid: { borderColor: '#f3f4f6' }
    };
    new ApexCharts(document.querySelector("#apex-diskusi"), optionsDiskusi).render();

    // Pie Chart: Wisata Review Terbanyak
    var optionsWisata = {
        chart: { type: 'pie', height: 240 },
        labels: @json($wisataLabels),
        series: @json($wisataData),
        colors: ['#fbbf24', '#60a5fa', '#34d399', '#f472b6', '#a78bfa'],
        legend: { position: 'bottom' },
        dataLabels: { enabled: true, style: { fontWeight: 'bold' } }
    };
    new ApexCharts(document.querySelector("#apex-wisata"), optionsWisata).render();

    // Donut Chart: Komposisi User
    var optionsUser = {
        chart: { type: 'donut', height: 240 },
        labels: @json($userRoleLabels),
        series: @json($userRoleData),
        colors: ['#10b981', '#6366f1'],
        legend: { position: 'bottom' },
        dataLabels: { enabled: true }
    };
    new ApexCharts(document.querySelector("#apex-user"), optionsUser).render();
});
</script>

@endif