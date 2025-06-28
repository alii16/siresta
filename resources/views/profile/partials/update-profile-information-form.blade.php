<section>
    <header class="border-b border-gray-200 pb-4 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            {{ __('Informasi Profil') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')
        
        <!-- Main Content Layout: Responsive -->
        <div class="flex flex-col md:flex-row md:gap-8">
            <!-- Photo Profile Section - Left on desktop, top on mobile -->
            <div class="flex flex-col items-center mb-8 md:mb-0 md:flex-shrink-0">
                <div class="relative group">
                    <img id="preview-foto-profil"
                        src="{{ $user->foto_profil ? asset('storage/foto_profil/' . $user->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=4f46e5&color=fff&size=128' }}"
                        alt="Foto Profil"
                        class="w-28 h-28 md:w-32 md:h-32 rounded-full object-cover border-4 border-white shadow-md transition-all duration-200">
        
                    <label for="foto_profil" class="absolute bottom-0 right-0 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded-full p-2 cursor-pointer shadow-lg transition-all duration-200 group-hover:scale-110" title="Ganti Foto Profil" style="border:2px solid #fff;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"></path>
                        </svg>
                        <input id="foto_profil" name="foto_profil" type="file" accept="image/*" class="hidden" onchange="previewFotoProfil(event)">
                    </label>
                </div>
                <p class="text-xs text-gray-500 mt-2 text-center md:w-36">Klik ikon kamera untuk mengganti foto profil</p>
                @if($errors->get('foto_profil'))
                    <div class="mt-2 text-sm text-red-600">
                        @foreach((array) $errors->get('foto_profil') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Form Fields Section - Right on desktop, bottom on mobile -->
            <div class="flex-1 space-y-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Nama Lengkap') }}
                        <span class="text-red-500">*</span>
                    </label>
                    <input id="name" 
                           name="name" 
                           type="text" 
                           value="{{ old('name', $user->name) }}"
                           class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" 
                           placeholder="Masukkan nama lengkap"
                           required 
                           autofocus 
                           autocomplete="name" />
                    @if($errors->get('name'))
                        <div class="mt-2 text-sm text-red-600">
                            @foreach((array) $errors->get('name') as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Alamat Email') }}
                        <span class="text-red-500">*</span>
                    </label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           value="{{ old('email', $user->email) }}"
                           class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200" 
                           placeholder="nama@example.com"
                           required 
                           autocomplete="username" />
                    @if($errors->get('email'))
                        <div class="mt-2 text-sm text-red-600">
                            @foreach((array) $errors->get('email') as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                                <div>
                                    <p class="text-sm text-yellow-800">
                                        {{ __('Alamat email Anda belum diverifikasi.') }}
                                    </p>
                                    <button form="send-verification" 
                                            class="mt-2 text-sm text-yellow-700 underline hover:text-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 rounded">
                                        {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                                    </button>
                                </div>
                            </div>

                            @if (session('status') === 'verification-link-sent')
                                <div class="mt-3 p-2 bg-green-50 border border-green-200 rounded">
                                    <p class="text-sm text-green-700">
                                        {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
            <div class="flex items-center">
                @if (session('status') === 'profile-updated')
                    <div x-data="{ show: true }" 
                         x-show="show" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90"
                         x-init="setTimeout(() => show = false, 3000)"
                         class="flex items-center text-sm text-green-600">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ __('Berhasil disimpan.') }}
                    </div>
                @endif
            </div>
            <button type="submit" 
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ __('Simpan Perubahan') }}
            </button>
        </div>
    </form>

    @if (session('status') === 'profile-updated')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Profil berhasil diperbarui.',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: `{!! implode('<br>', $errors->all()) !!}`,
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                });
            });
        </script>
    @endif

    <script>
    function previewFotoProfil(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-foto-profil').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</section>