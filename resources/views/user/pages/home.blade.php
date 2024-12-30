@extends('user.app')

@section('content')
    <div
        class="h-screen w-full flex flex-col justify-center items-center 
            bg-gradient-to-br from-[#4A90E2] via-[#50C878] to-[#FF6B6B] 
            overflow-hidden relative">

        {{-- Animasi Bubble Background --}}
        @include('user.components.animasi.bubble')

        {{-- Konten Utama --}}
        <div
            class="z-10 text-center space-y-8 
                bg-white bg-opacity-20 
                backdrop-blur-lg 
                rounded-3xl 
                p-12 
                shadow-2xl 
                animate-fade-in">

            {{-- Judul dengan Animasi --}}
            <h1
                class="text-6xl font-bold 
                   text-transparent 
                   bg-clip-text 
                   bg-gradient-to-r 
                   from-[#FFD700] 
                   via-[#FF4500] 
                   to-[#FF1493] 
                   animate-pulse">
                TaMath
            </h1>

            {{-- Subtitle --}}
            <h4 class="text-2xl text-white font-medium tracking-wide">
                Tamatkan matematika bersama TaMath!
            </h4>

            {{-- Tombol Start dengan Hover Effect --}}
            <div class="mt-10">
                <a href="{{ route('pilih-level') }}"
                    class="px-10 py-4 
                      bg-gradient-to-r 
                      from-[#2ECC71] 
                      to-[#3498DB] 
                      text-white 
                      font-bold 
                      rounded-full 
                      hover:scale-110 
                      transform 
                      transition 
                      duration-300 
                      shadow-lg 
                      hover:shadow-2xl 
                      inline-block">
                    Mulai Petualangan
                </a>
            </div>
        </div>
    </div>
@endsection
