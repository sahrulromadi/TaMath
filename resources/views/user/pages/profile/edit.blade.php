@extends('user.app')

@section('content')
    <div
        class="h-screen w-full flex flex-col justify-center items-center 
                bg-gradient-to-br from-[#6A5ACD] via-[#4169E1] to-[#1E90FF] 
                overflow-hidden relative">

        {{-- Tombol Previous --}}
        <x-previous :route="route('pilih-level')" />

        {{-- Animasi Background --}}
        @include('user.components.animasi.bubble')

        {{-- Konten Utama --}}
        <div
            class="z-10 w-full max-w-4xl flex flex-col justify-center items-center 
                    bg-white bg-opacity-20 backdrop-blur-lg rounded-3xl p-12 shadow-2xl animate-fade-in">

            {{-- Judul Halaman --}}
            <h1
                class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FFD700] via-[#FF4500] to-[#FF1493] leading-relaxed mb-10">
                Edit Profil
            </h1>

            {{-- Form Edit Profil --}}
            <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data"
                class="grid grid-cols-1 gap-6 w-full">
                @csrf
                @method('PUT')

                {{-- Gambar Profil --}}
                <div class="flex flex-col items-center">
                    <img id="profileImage"
                        src="{{ $user->picture ? Storage::url($user->picture) : asset('assets/user/img/avatar.png') }}"
                        alt="User  Picture" class="w-32 h-32 rounded-full mb-4">
                    <input type="file" name="picture" accept="image/*" class="mt-2" onchange="previewImage(event)">
                    @error('picture')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-5">
                    {{-- Nama --}}
                    <div>
                        <label for="name" class="block text-left text-lg font-semibold">Nama</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                            class="mt-1 p-2 w-full rounded-lg border border-gray-300" required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-left text-lg font-semibold">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="mt-1 p-2 w-full rounded-lg border border-gray-300" required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-left text-lg font-semibold">Password Baru</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 p-2 w-full rounded-lg border border-gray-300" minlength="8" maxlength="12">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-left text-lg font-semibold">Konfirmasi
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="mt-1 p-2 w-full rounded-lg border border-gray-300" minlength="8" maxlength="12">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                    Perbarui Profil
                </button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const image = document.getElementById('profileImage');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
