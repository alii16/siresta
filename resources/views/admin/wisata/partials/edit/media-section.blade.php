<div class="border-t border-gray-200 pt-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
            </path>
        </svg>
        Media & Lokasi
    </h3>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Foto Utama -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Foto Utama
            </label>
            <div class="space-y-3">
                <input type="file" name="foto"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                    accept="image/*">
                @if ($wisatum->foto)
                    <div class="relative inline-block">
                        <img src="{{ asset('storage/' . $wisatum->foto) }}" alt="Current photo"
                            class="w-32 h-32 rounded-lg object-cover border border-gray-200 shadow-sm">
                        <div class="absolute -top-2 -right-2 bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            Current
                        </div>
                    </div>
                @endif
                <p class="text-sm text-gray-500">Biarkan kosong jika tidak ingin mengganti foto.</p>
            </div>
        </div>

        <!-- Tambah Galeri Foto -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Tambah Foto Galeri
            </label>
            <input type="file" name="galeri[]" multiple
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                accept="image/*">
            <p class="text-sm text-gray-500 mt-2">Upload maksimal 3 foto baru untuk ditambahkan ke
                galeri.</p>
        </div>
    </div>
</div>