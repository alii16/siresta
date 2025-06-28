<div class="border-b border-gray-200 pb-6">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Media & Lokasi</h2>
    <div class="space-y-6">
        <!-- Foto Utama -->
        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                Foto Utama
                <span class="text-red-500">*</span>
            </label>
            <div
                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition-colors duration-200">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="foto"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <span>Upload foto</span>
                            <input id="foto" name="foto" type="file" class="sr-only" accept="image/*" required>
                        </label>
                        <p class="pl-1">atau drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 5MB</p>
                </div>
            </div>
        </div>

        <!-- Galeri Foto -->
        <div>
            <label for="galeri" class="block text-sm font-medium text-gray-700 mb-2">
                Galeri Foto (Opsional)
            </label>
            <div
                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition-colors duration-200">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="galeri"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <span>Upload galeri</span>
                            <input id="galeri" name="galeri[]" type="file" class="sr-only" multiple accept="image/*">
                        </label>
                        <p class="pl-1">atau drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">Maksimal 3 foto, PNG, JPG, GIF hingga 5MB</p>
                </div>
            </div>
        </div>

        <!-- Embed Maps -->
        <div>
            <label for="maps_embed" class="block text-sm font-medium text-gray-700 mb-2">
                Embed Google Maps (Opsional)
            </label>
            <textarea id="maps_embed" name="maps_embed" rows="3"
                class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                placeholder="Paste iframe embed code dari Google Maps">{{ old('maps_embed') }}</textarea>
            <p class="mt-1 text-xs text-gray-500">Copy dan paste iframe embed code dari Google Maps untuk menampilkan
                lokasi</p>
        </div>
    </div>
</div>