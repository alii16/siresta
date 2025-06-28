<h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
        </path>
    </svg>
    Galeri Foto
</h2>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    @foreach ($wisata->galeri->take(3) as $foto)
        <div class="group relative overflow-hidden rounded-lg">
            <img src="{{ asset('storage/' . $foto->foto) }}" alt="Galeri {{ $wisata->nama }}"
                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
        </div>
    @endforeach
</div>