@if($wisata->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($wisata as $item)
            <div class="group bg-white rounded-lg shadow border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <!-- Image Container -->
                <div class="relative overflow-hidden h-48">
                    <img src="{{ asset('storage/' . $item->foto) }}"
                            alt="{{ $item->nama }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    
                    <!-- Category Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-white/90 backdrop-blur-sm shadow-sm">
                            @switch($item->kategori)
                                @case('pantai')
                                    Pantai
                                    @break
                                @case('gunung')
                                    Gunung
                                    @break
                                @case('danau')
                                    Danau
                                    @break
                                @case('air terjun')
                                    Air Terjun
                                    @break
                                @case('budaya')
                                    Budaya
                                    @break
                                @case('kuliner')
                                    Kuliner
                                    @break
                                @default
                                    {{ ucfirst($item->kategori) }}
                            @endswitch
                        </span>
                    </div>

                    <!-- Rating Badge -->
                    <div class="absolute top-3 right-3">
                        <div class="flex items-center space-x-1 bg-yellow-100 backdrop-blur-sm rounded-full px-2 py-1 shadow-sm">
                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-xs font-semibold text-yellow-500">
                                {{ number_format($item->reviews->avg('rating') ?? 0, 1) }}
                            </span>
                        </div>
                    </div>

                    <!-- Quick Action Buttons -->
                    <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <div class="flex space-x-2">
                            <button class="p-1.5 bg-white/80 backdrop-blur-sm rounded-full shadow-sm hover:bg-white transition-colors duration-200">
                                <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <button class="p-1.5 bg-white/80 backdrop-blur-sm rounded-full shadow-sm hover:bg-white transition-colors duration-200">
                                <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 line-clamp-2">
                            {{ $item->nama }}
                        </h3>
                        <div class="ml-2 text-right">
                            <div class="text-sm font-bold text-green-600">
                                {{ $item->harga_tiket ? 'Rp ' . number_format($item->harga_tiket, 0, ',', '.') : 'Gratis' }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Location -->
                    <div class="flex items-center text-gray-600 mb-3">
                        <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-sm font-medium">{{ $item->lokasi }}</span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                        {{ $item->deskripsi ?? 'Destinasi wisata yang menawarkan keindahan alam dan pengalaman tak terlupakan untuk dikunjungi bersama keluarga.' }}
                    </p>

                    <!-- Features/Tags -->
                    <div class="flex flex-wrap gap-1.5 mb-4">
                        @php 
                            $features = ['Foto Instagramable', 'Keluarga', 'Alam', 'Petualangan'];
                            $selectedFeatures = array_slice($features, 0, rand(2,3));
                        @endphp
                        @foreach($selectedFeatures as $feature)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                {{ $feature }}
                            </span>
                        @endforeach
                    </div>

                    <!-- Stats Row -->
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4 pt-3 border-t border-gray-100">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span>{{ rand(150, 999) }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                <span>{{ rand(20, 99) }}</span>
                            </div>
                        </div>
                        <div class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full font-medium">
                            {{ ['Buka', 'Populer', 'Trending'][array_rand(['Buka', 'Populer', 'Trending'])] }}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <a href="{{ route('wisata.detail', $item->id) }}" 
                            class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow hover:shadow-md transform hover:-translate-y-0.5 group">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <button class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-lg transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-8">
        <button class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 text-sm font-semibold rounded-lg transition-all duration-200 shadow hover:shadow-md transform hover:-translate-y-0.5">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Muat Lebih Banyak
        </button>
    </div>
@else
    <!-- Enhanced Empty State -->
    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow border border-white/20 p-12 text-center">
        <div class="w-24 h-24 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Oops! Tidak Ada Destinasi Ditemukan</h3>
        <p class="text-gray-600 mb-6 max-w-md mx-auto leading-relaxed">
            @if($kategori)
                Maaf, tidak ada destinasi wisata dengan kategori <strong>"{{ $kategori }}"</strong> yang ditemukan saat ini.
            @else
                Sepertinya belum ada destinasi wisata yang tersedia. Tim kami sedang bekerja keras menambahkan konten baru!
            @endif
        </p>
        @if($kategori)
            <div class="space-y-3">
                <a href="{{ route('wisata.index') }}" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-lg transition-all duration-200 shadow hover:shadow-md transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Lihat Semua Destinasi
                </a>
                <p class="text-sm text-gray-500">
                    Atau coba kategori lain untuk menemukan destinasi menarik
                </p>
            </div>
        @endif
    </div>
@endif