<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Nama -->
    <div class="lg:col-span-2">
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                </path>
            </svg>
            Nama Destinasi
        </label>
        <input type="text" name="nama" value="{{ $wisatum->nama }}"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            placeholder="Masukkan nama destinasi wisata" required>
    </div>

    <!-- Lokasi -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Lokasi
        </label>
        <input type="text" name="lokasi" value="{{ $wisatum->lokasi }}"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            placeholder="Contoh: Bali, Indonesia" required>
    </div>

    <!-- Kategori -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
            Kategori
        </label>
        <select name="kategori"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
            <option value="pantai" @selected($wisatum->kategori == 'pantai')>🏖️ Pantai</option>
            <option value="gunung" @selected($wisatum->kategori == 'gunung')>🏔️ Gunung</option>
            <option value="danau" @selected($wisatum->kategori == 'danau')>🏞️ Danau</option>
            <option value="air terjun" @selected($wisatum->kategori == 'air terjun')>💦 Air Terjun</option>
        </select>
    </div>

    <!-- Jam Buka -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Jam Buka
        </label>
        <input type="text" name="jam_buka" value="{{ $wisatum->jam_buka }}"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            placeholder="Contoh: 08:00 - 17:00" required>
    </div>

    <!-- Harga Tiket -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                </path>
            </svg>
            Harga Tiket (Rp)
        </label>
        <input type="number" name="harga_tiket" value="{{ $wisatum->harga_tiket }}"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            placeholder="Contoh: 25000" required>
    </div>
</div>