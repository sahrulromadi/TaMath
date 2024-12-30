@extends('user.app')

@section('content')
    <div
        class="min-h-screen flex items-center justify-center 
            bg-gradient-to-br from-[#6A5ACD] via-[#4169E1] to-[#1E90FF] 
            overflow-hidden relative">

        {{-- Animasi Background --}}
        @include('user.components.animasi.bubble')

        {{-- Konten Utama --}}
        <div
            class="z-10 w-full max-w-md
                bg-white bg-opacity-20 
                backdrop-blur-lg 
                rounded-3xl 
                p-10 
                shadow-2xl 
                animate-fade-in 
                relative 
                overflow-hidden">

            {{-- Judul --}}
            <h2
                class="text-4xl font-bold 
                   text-transparent 
                   bg-clip-text 
                   bg-gradient-to-r 
                   from-[#FFD700] 
                   via-[#FF4500] 
                   to-[#FF1493] 
                   text-center 
                   mb-8">
                Daftar Akun Baru
            </h2>

            {{-- Form Register --}}
            <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                @csrf

                {{-- Input Nama --}}
                <div class="input-group">
                    <label for="name" class="input-label">Nama</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="name" name="name" class="input-field" value="{{ old('name') }}"
                            required autocomplete="name">
                    </div>
                    @error('name')
                        <p class="input-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Email --}}
                <div class="input-group">
                    <label for="email" class="input-label">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" class="input-field" value="{{ old('email') }}"
                            required autocomplete="email">
                    </div>
                    @error('email')
                        <p class="input-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Password --}}
                <div class="input-group">
                    <label for="password" class="input-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" class="input-field" required
                            autocomplete="new-password">
                    </div>
                    @error('password')
                        <p class="input-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Konfirmasi Password --}}
                <div class="input-group">
                    <label for="password_confirmation" class="input-label">Konfirmasi Kata Sandi</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input-field"
                            required autocomplete="new-password">
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit"
                    class="w-full py-4 
                           bg-gradient-to-r 
                           from-[#2ECC71] 
                           to-[#3498DB] 
                           text-white 
                           rounded-full 
                           hover:scale-105 
                           transform 
                           transition 
                           duration-300 
                           shadow-lg 
                           hover:shadow-2xl">
                    Daftar
                </button>

                {{-- Link Login --}}
                <div class="text-center text-sm text-white">
                    <p>Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-[#FFD700] hover:text-[#FF4500] transition duration-300">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
