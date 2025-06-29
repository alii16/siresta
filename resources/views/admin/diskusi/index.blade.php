@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white">
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2 flex items-center">
                        <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Form Diskusi Tempat Wisata
                    </h1>
                    <p class="text-gray-600 leading-relaxed">Kelola dan pantau diskusi pengunjung di setiap destinasi wisata.</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        @include('admin.diskusi.partials.stats-section')

        <!-- Main Content Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Daftar Diskusi Wisata
                    </h2>
                    <form method="GET" action="{{ route('admin.diskusi.index') }}" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-3 w-full sm:w-auto">
                        <div class="relative w-full sm:w-56">
                            <input type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Cari destinasi..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm w-full">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <select name="kategori"
                            class="border border-gray-300 rounded-lg px-8 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-auto">
                            <option value="all">Semua Kategori</option>
                            @foreach($kategoriList as $kategori)
                                <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                                    {{ ucfirst($kategori) }}
                                </option>
                            @endforeach
                        </select>
                        <div class="flex gap-2">
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 cursor-pointer text-white text-xs font-medium rounded-lg transition-all duration-200 w-full sm:w-auto justify-center">
                                Cari
                            </button>
                            <a href="{{ route('admin.diskusi.index') }}"
                                class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium rounded-lg transition-all duration-200 w-full sm:w-auto justify-center">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table -->
            @include('admin.diskusi.partials.table-section')

            <!-- Table Footer -->
            @if($wisataList->count() > 0)
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">{{ $wisataList->count() }}</span> destinasi wisata
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 cursor-not-allowed disabled:opacity-50" disabled>
                            Previous
                        </button>
                        <span class="px-3 py-1 text-sm bg-indigo-600 text-white rounded">1</span>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 cursor-not-allowed disabled:opacity-50" disabled>
                            Next
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection