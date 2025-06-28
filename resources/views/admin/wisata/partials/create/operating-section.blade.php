<div class="border-b border-gray-200 pb-6">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Operasional</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Jam Buka -->
        <div>
            <label for="jam_buka" class="block text-sm font-medium text-gray-700 mb-2">
                Jam Operasional
                <span class="text-red-500">*</span>
            </label>
            <input type="text" id="jam_buka" name="jam_buka" value="{{ old('jam_buka') }}"
                placeholder="Contoh: 08:00 - 17:00"
                class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                required>
        </div>

        <!-- Harga Tiket -->
        <div>
            <label for="harga_tiket" class="block text-sm font-medium text-gray-700 mb-2">
                Harga Tiket (Rp)
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                <input type="number" id="harga_tiket" name="harga_tiket" value="{{ old('harga_tiket') }}"
                    class="block w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                    placeholder="0" min="0" required>
            </div>
        </div>
    </div>
</div>