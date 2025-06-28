<h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
    <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
    </svg>
    Rating & Ulasan
</h3>

<div class="text-center mb-6">
    <div class="text-4xl font-bold text-gray-900 mb-1">{{ number_format($averageRating, 1) }}</div>
    <div class="flex items-center justify-center mb-2">
        @for($i = 1; $i <= 5; $i++)
            <svg class="w-5 h-5 {{ $i <= $averageRating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                </path>
            </svg>
        @endfor
    </div>
    <p class="text-sm text-gray-600">Berdasarkan {{ $reviewCount }} ulasan</p>
</div>

@auth
    @php
        $sudahReview = $wisata->reviews->where('user_id', auth()->id())->count() > 0;
    @endphp

    @if (!$sudahReview)
        <div class="border-t border-gray-200 pt-6">
            <h4 class="font-medium text-gray-900 mb-3">Berikan Ulasan Anda</h4>
            <form action="{{ route('review.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <select name="rating" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ Sangat Baik</option>
                        <option value="4">⭐⭐⭐⭐ Baik</option>
                        <option value="3">⭐⭐⭐ Cukup</option>
                        <option value="2">⭐⭐ Kurang</option>
                        <option value="1">⭐ Sangat Kurang</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Komentar</label>
                    <textarea name="komentar" rows="3" required placeholder="Bagikan pengalaman Anda..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 cursor-pointer text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                    Kirim Ulasan
                </button>
            </form>
        </div>
    @else
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
            <svg class="w-8 h-8 text-green-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-green-800 font-medium">Terima kasih atas ulasan Anda!</p>
        </div>
    @endif
@else
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
        <p class="text-gray-600 mb-3">Ingin memberikan ulasan?</p>
        <a href="{{ route('login') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
            Login untuk Review
        </a>
    </div>
@endauth
