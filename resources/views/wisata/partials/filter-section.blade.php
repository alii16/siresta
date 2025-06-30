<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Filter Destinasi</h3>
                <p class="text-sm text-gray-600">Temukan destinasi sesuai preferensi Anda</p>
            </div>
        </div>

        <form method="GET" action="{{ route('wisata.index') }}" class="flex flex-col sm:flex-row items-start sm:items-end space-y-3 sm:space-y-0 sm:space-x-4">
            <div class="relative">
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori" id="kategori" class="block w-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-sm">
                    <option value="">Semua Kategori</option>
                    <option value="pantai" {{ $kategori == 'pantai' ? 'selected' : '' }}>Pantai</option>
                    <option value="gunung" {{ $kategori == 'gunung' ? 'selected' : '' }}>Gunung</option>
                    <option value="danau" {{ $kategori == 'danau' ? 'selected' : '' }}>Danau</option>
                    <option value="air terjun" {{ $kategori == 'air terjun' ? 'selected' : '' }}>Air Terjun</option>
                    <option value="budaya" {{ $kategori == 'budaya' ? 'selected' : '' }}>Budaya</option>
                    <option value="kuliner" {{ $kategori == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                </select>
            </div>
        
            <div class="relative">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Destinasi</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari nama destinasi..." class="block w-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
            </div>

            @if ($kategori || request('search'))
                <div class="pt-5">
                    <a href="{{ route('wisata.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Reset
                    </a>
                </div>
            @endif
        </form>
    </div>

    @if ($kategori || request('search'))
        <div class="mt-4 pt-4 border-t border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-2 md:space-y-0">
                <div class="flex items-center gap-3">
                    @if ($kategori)
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-800">
                            Filter: {{ ucfirst($kategori) }}
                        </span>
                    @endif

                    @if (request('search'))
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-50 text-yellow-800">
                            Cari: "{{ request('search') }}"
                        </span>
                    @endif
                </div>
                <span class="text-sm text-gray-600">{{ $wisata->count() }} hasil ditemukan</span>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('kategori').addEventListener('change', function () {
            this.form.submit();
        });
    });
</script>