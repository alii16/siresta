<h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
        </path>
    </svg>
    Forum Diskusi
</h2>

@auth
    <div class="bg-gray-50 rounded-lg p-4 mb-6">
        <form action="{{ route('diskusi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
            <textarea name="pesan" rows="3" required placeholder="Tanyakan sesuatu tentang destinasi ini..."
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 mb-3"></textarea>
            <button type="submit"
                class="bg-green-600 flex justify-center items-center hover:bg-green-700 cursor-pointer text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 inline rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            </button>
        </form>
    </div>
@else
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6 text-center">
        <p class="text-blue-800 mb-3">Ingin bergabung dalam diskusi?</p>
        <a href="{{ route('login') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
            Login untuk Berdiskusi
        </a>
    </div>
@endauth

<!-- Discussion List -->
<div class="space-y-6">
    @foreach ($diskusi as $komentar)
        <div class="border-l-4 border-green-200 pl-4">
            <!-- Main Comment -->
            <div class="flex space-x-3 mb-3">
                @php
                    $user = $komentar->user; // untuk parent, atau $balasan->user untuk anak
                    $avatarColors = [
                        ['bg-green-100', 'text-green-700'],
                        ['bg-blue-100', 'text-blue-700'],
                        ['bg-yellow-100', 'text-yellow-700'],
                        ['bg-purple-100', 'text-purple-700'],
                        ['bg-pink-100', 'text-pink-700'],
                        ['bg-red-100', 'text-red-700'],
                    ];
                    $userKey = $user ? $user->id : crc32($user->name ?? 'anonim');
                    $colorIdx = $userKey % count($avatarColors);
                    [$bgColor, $textColor] = $avatarColors[$colorIdx];
                @endphp
                @if($user && $user->foto_profil)
                    <img src="{{ asset('storage/foto_profil/' . $user->foto_profil) }}" alt="Foto Profil"
                        class="w-10 h-10 rounded-full object-cover border border-gray-200 mr-3">
                @else
                    <div
                        class="w-10 h-10 {{ $bgColor }} {{ $textColor }} rounded-full flex items-center justify-center font-bold text-xl mr-3">
                        {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}{{ strtoupper(substr(explode(' ', $user->name ?? '')[1] ?? '', 0, 1)) }}
                    </div>
                @endif
                <div class="flex-1">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <p class="font-medium text-gray-900">{{ $komentar->user->name ?? 'Anonim' }}</p>
                            <span class="text-xs text-gray-500">{{ $komentar->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700">{{ $komentar->pesan }}</p>
                    </div>

                    @auth
                        <button onclick="document.getElementById('reply-{{ $komentar->id }}').classList.toggle('hidden')"
                            class="flex justify-center items-center text-sm text-green-600 hover:text-green-700 mt-2 font-medium cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3">
                                </path>
                            </svg>
                            Balas
                        </button>

                        <form id="reply-{{ $komentar->id }}" action="{{ route('diskusi.store') }}" method="POST"
                            class="mt-3 hidden">
                            @csrf
                            <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
                            <input type="hidden" name="parent_id" value="{{ $komentar->id }}">
                            <div class="flex space-x-2">
                                <textarea name="pesan" rows="2" required placeholder="Tulis balasan..."
                                    class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                                <button type="submit"
                                    class="flex justify-center items-center bg-green-600 hover:bg-green-700 cursor-pointer text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 rotate-90" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>

            <!-- Replies -->
            @foreach ($komentar->anak as $balasan)
                @php
                    $user = $balasan->user;
                    $avatarColors = [
                        ['bg-green-100', 'text-green-700'],
                        ['bg-blue-100', 'text-blue-700'],
                        ['bg-yellow-100', 'text-yellow-700'],
                        ['bg-purple-100', 'text-purple-700'],
                        ['bg-pink-100', 'text-pink-700'],
                        ['bg-red-100', 'text-red-700'],
                    ];
                    $userKey = $user ? $user->id : crc32($user->name ?? 'anonim');
                    $colorIdx = $userKey % count($avatarColors);
                    [$bgColor, $textColor] = $avatarColors[$colorIdx];
                @endphp
                <div class="flex space-x-3 ml-8 mt-3">
                    @if($user && $user->foto_profil)
                        <img src="{{ asset('storage/foto_profil/' . $user->foto_profil) }}" alt="Foto Profil"
                            class="w-8 h-8 rounded-full object-cover border border-gray-200">
                    @else
                        <div
                            class="w-8 h-8 {{ $bgColor }} {{ $textColor }} rounded-full flex items-center justify-center font-bold text-xs">
                            {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}{{ strtoupper(substr(explode(' ', $user->name ?? '')[1] ?? '', 0, 1)) }}
                        </div>
                    @endif
                    <div class="flex-1">
                        <div class="bg-white border border-gray-200 rounded-lg p-3">
                            <div class="flex items-center justify-between mb-1">
                                <p class="text-sm font-medium text-gray-900">{{ $balasan->user->name ?? 'Anonim' }}</p>
                                <span class="text-xs text-gray-500">{{ $balasan->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-gray-700">{{ $balasan->pesan }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    @if($diskusi->count() == 0)
        <div class="text-center py-8">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
            </div>
            <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Diskusi</h4>
            <p class="text-gray-600">Jadilah yang pertama untuk memulai diskusi tentang destinasi ini!</p>
        </div>
    @endif
</div>