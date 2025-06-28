<div class="border-b border-gray-200 pb-6">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Nama -->
        <div class="lg:col-span-2">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                Nama Tempat Wisata
                <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                placeholder="Masukkan nama tempat wisata" required>
        </div>

        <!-- Lokasi -->
        <div>
            <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                Lokasi
                <span class="text-red-500">*</span>
            </label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}"
                class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                placeholder="Masukkan lokasi" required>
        </div>

        <!-- Kategori -->
        <div>
            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                Kategori
                <span class="text-red-500">*</span>
            </label>
            <select id="kategori" name="kategori"
                class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                <option value="">Pilih Kategori</option>
                <option value="pantai" {{ old('kategori') == 'pantai' ? 'selected' : '' }}>Pantai</option>
                <option value="gunung" {{ old('kategori') == 'gunung' ? 'selected' : '' }}>Gunung</option>
                <option value="danau" {{ old('kategori') == 'danau' ? 'selected' : '' }}>Danau</option>
                <option value="air terjun" {{ old('kategori') == 'air terjun' ? 'selected' : '' }}>Air Terjun</option>
            </select>
        </div>

        <!-- Deskripsi -->
        <div class="lg:col-span-2">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                Deskripsi
                <span class="text-red-500">*</span>
            </label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                placeholder="Masukkan deskripsi tempat wisata" required>{{ old('deskripsi') }}</textarea>
        </div>
    </div>
</div>