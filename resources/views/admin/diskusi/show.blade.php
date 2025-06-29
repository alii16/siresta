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
                        Detail Diskusi Pengunjung
                    </h1>
                    <p class="text-gray-600 leading-relaxed">Pantau dan kelola semua komentar diskusi dari pengunjung destinasi wisata.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.diskusi.index') }}" 
                        class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 mr-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-6a2 2 0 012-2h8z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Komentar</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $diskusiGroup->flatten()->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Forum Diskusi</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $diskusiGroup->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Aktivitas Terbaru</p>
                        <p class="text-2xl font-bold text-gray-900">
                            @if($diskusiGroup->flatten()->isNotEmpty())
                                {{ $diskusiGroup->flatten()->sortByDesc('created_at')->first()->created_at->diffForHumans() }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012 2h2a2 2 0 012-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Diskusi Pengunjung
                    </h2>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $diskusiGroup->count() }} Pengunjung Aktif
                        </span>
                    </div>
                </div>
            </div>

            <div class="px-6 py-6">
                @if ($diskusiGroup->count())
                    <div class="space-y-6">
                        @foreach ($diskusiGroup as $userId => $komentarList)
                            @php
                                $name = $komentarList->first()->user->name ?? 'Anonim';
                                $initials = collect(explode(' ', $name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->take(2)->implode('');
                                $totalKomentar = $komentarList->count();
                                $komentarTerbaru = $komentarList->sortByDesc('created_at')->first();
                            @endphp

                            <div class="border border-gray-200 rounded-xl bg-white shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                                <!-- User Header -->
                                <div class="bg-gradient-to-r from-indigo-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <div class="relative">
                                                @php
                                                    $user = $komentarList->first()->user ?? null;
                                                @endphp
                                                @if($user && $user->foto_profil)
                                                    <img src="{{ asset('storage/foto_profil/' . $user->foto_profil) }}"
                                                        alt="Foto Profil"
                                                        class="w-12 h-12 rounded-full object-cover shadow-lg border-2 border-white">
                                                @else
                                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-lg">
                                                        {{ $initials }}
                                                    </div>
                                                @endif
                                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $name }}</h3>
                                                <div class="flex items-center space-x-4 text-sm text-gray-600">
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-6a2 2 0 012-2h8z"></path>
                                                        </svg>
                                                        {{ $totalKomentar }} Komentar
                                                    </span>
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        Terakhir: {{ $komentarTerbaru->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white text-indigo-700 border border-indigo-200">
                                                Pengunjung Aktif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Comments List -->
                                <div class="px-6 py-4">
                                    <div class="space-y-4">
                                        @foreach ($komentarList->sortBy('created_at') as $index => $komentar)
                                            <div class="relative pl-6 pb-4 {{ !$loop->last ? 'border-l-2 border-gray-200 ml-3' : '' }}">
                                                @if (!$loop->last)
                                                    <div class="absolute left-0 top-0 w-3 h-3 bg-indigo-600 rounded-full transform -translate-x-1.5"></div>
                                                @else
                                                    <div class="absolute left-0 top-0 w-3 h-3 bg-gray-400 rounded-full transform -translate-x-1.5"></div>
                                                @endif
                                                
                                                <div class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors duration-200">
                                                    <div class="flex items-start justify-between mb-3">
                                                        <div class="flex items-center space-x-2">
                                                            <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-indigo-100 text-indigo-800">
                                                                #{{ $index + 1 }}
                                                            </span>
                                                            <span class="text-xs text-gray-500 flex items-center">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z"></path>
                                                                </svg>
                                                                {{ $komentar->created_at->format('d M Y, H:i') }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="space-y-3">
                                                        <div class="flex items-start space-x-3">
                                                            <div class="flex-shrink-0">
                                                                <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                                                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="flex-1 min-w-0">
                                                                <p class="text-sm font-medium text-gray-900 mb-1">Komentar Utama</p>
                                                                <p class="text-sm text-gray-700 leading-relaxed">{{ $komentar->pesan }}</p>
                                                            </div>
                                                        </div>

                                                        @if ($komentar->isi)
                                                            <div class="flex items-start space-x-3 pl-11">
                                                                <div class="flex-shrink-0">
                                                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m8-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-1 min-w-0">
                                                                    <p class="text-sm font-medium text-gray-900 mb-1">Detail Tambahan</p>
                                                                    <p class="text-sm text-gray-700 leading-relaxed">{{ $komentar->isi }}</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-200">
                                                        <div class="text-xs text-gray-500">
                                                            {{ $komentar->created_at->diffForHumans() }}
                                                        </div>
                                                        <form method="POST" action="{{ route('admin.diskusi.destroy', $komentar->id) }}" class="form-hapus">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-50 hover:bg-red-100 text-red-700 text-xs font-medium rounded-lg transition-all duration-200 border border-red-200 hover:border-red-300">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                                Hapus Komentar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Diskusi</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">Belum ada pengunjung yang memberikan komentar atau diskusi untuk destinasi wisata ini.</p>
                        <div class="flex items-center justify-center">
                            <div class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-600 text-sm font-medium rounded-lg">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tunggu pengunjung untuk memulai diskusi
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Footer Information -->
            @if($diskusiGroup->count() > 0)
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-6a2 2 0 012-2h8z"></path>
                            </svg>
                            Total {{ $diskusiGroup->flatten()->count() }} komentar
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z"></path>
                            </svg>
                            dari {{ $diskusiGroup->count() }} forum
                        </span>
                    </div>
                    <div class="text-xs text-gray-500">
                        Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection