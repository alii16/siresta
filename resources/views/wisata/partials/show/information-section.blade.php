<h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    Informasi Destinasi
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-600">Jam Operasional</p>
            <p class="font-semibold text-gray-900">{{ $wisata->jam_buka }}</p>
        </div>
    </div>

    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                </path>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-600">Harga Tiket</p>
            <p class="font-semibold text-gray-900">Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>
        </div>
    </div>
</div>

<div class="prose prose-gray max-w-none">
    <h4 class="text-lg font-medium text-gray-900 mb-3">Deskripsi</h4>
    <p class="text-gray-700 leading-relaxed">{{ $wisata->deskripsi }}</p>
</div>