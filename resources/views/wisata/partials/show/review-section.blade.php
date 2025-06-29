<h3 class="text-lg font-semibold text-gray-900 mb-4">Ulasan Terbaru</h3>
<div class="space-y-4 max-h-96 overflow-y-auto">
    @foreach ($wisata->reviews->take(5) as $review)
        <div class="flex space-x-3 pb-4 border-b border-gray-100 last:border-b-0">
            @php $reviewUser = $review->user; @endphp
            @if($reviewUser && $reviewUser->foto_profil)
                <img src="{{ asset('storage/foto_profil/' . $reviewUser->foto_profil) }}" alt="Foto Profil"
                    class="w-10 h-10 rounded-full object-cover border border-gray-200 mr-3">
            @else
                <div
                    class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xl mr-3">
                    {{ strtoupper(substr($reviewUser->name ?? 'A', 0, 1)) }}
                </div>
            @endif
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between mb-1">
                    <p class="text-sm font-medium text-gray-900">{{ $review->user->name ?? 'Anonim' }}</p>
                    <div class="flex items-center">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                        @endfor
                    </div>
                </div>
                <p class="text-sm text-gray-700 mb-1">{{ \App\Helpers\BadwordFilter::filter($review->komentar) }}</p>
                <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</div>