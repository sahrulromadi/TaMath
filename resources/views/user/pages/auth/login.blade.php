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
                Masuk
            </h2>

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                @csrf

                {{-- Input Email --}}
                <div class="input-group">
                    <label for="email" class="input-label">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" class="input-field"
                            placeholder="Masukkan email Anda" value="{{ old('email') }}" required autocomplete="email">
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
                        <input type="password" id="password" name="password" class="input-field"
                            placeholder="Masukkan kata sandi Anda" required autocomplete="current-password">
                    </div>
                    @error('password')
                        <p class="input-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me & Forgot Password --}}
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center text-sm text-white">
                        <input type="checkbox" name="remember"
                            class="form-checkbox 
                                  text-[#2ECC71] 
                                  bg-white 
                                  bg-opacity-20 
                                  border-white 
                                  border-opacity-50 
                                  rounded 
                                  focus:ring-2 
                                  focus:ring-[#2ECC71]">
                        <span class="ml-2">Ingat Saya</span>
                    </label>
                    <a href=""
                        class="text-sm text-[#FFD700] hover:text-[#FF4500] transition duration-300">
                        Lupa Kata Sandi?
                    </a>
                </div>

                {{-- Tombol Login --}}
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
                    Login
                </button>

                {{-- Link Registrasi --}}
                <div class="text-center text-sm text-white mt-6">
                    <p>Belum punya akun?
                        <a href="{{ route('register') }}"
                            class="text-[#FFD700] hover:text-[#FF4500] transition duration-300">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
