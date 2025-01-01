@extends('user.app')

@section('content')
    <div
        class="h-screen w-full flex flex-col justify-center items-center 
            bg-gradient-to-br from-[#6A5ACD] via-[#4169E1] to-[#1E90FF] 
            overflow-hidden relative">

        {{-- Tombol Previous --}}
        <x-previous :route="route('home')" />

        {{-- Animasi Background --}}
        @include('user.components.animasi.bubble')

        {{-- Konten Utama --}}
        <div
            class="z-10 w-full max-w-md text-center space-y-10 
                bg-white bg-opacity-20 
                backdrop-blur-lg 
                rounded-3xl 
                p-12 
                shadow-2xl 
                animate-fade-in">

            {{-- Judul --}}
            <div class="mb-10">
                <h1
                    class="text-5xl font-bold 
                       text-transparent 
                       bg-clip-text 
                       bg-gradient-to-r 
                       from-[#FFD700] 
                       via-[#FF4500] 
                       to-[#FF1493]">
                    Pilih Kelas
                </h1>
            </div>

            {{-- Grid Kategori --}}
            <div class="grid grid-cols-1 gap-6">
                @foreach ($categories as $category)
                    <a href="{{ route('list-soal', $category->name) }}"
                        class="category-card 
                          py-5 
                          text-center 
                          text-white 
                          font-bold 
                          text-xl 
                          rounded-full 
                          transform 
                          transition 
                          duration-300 
                          hover:scale-105 
                          hover:shadow-2xl 
                          relative 
                          overflow-hidden">
                        <span class="relative z-10">{{ $category->name }}</span>
                        <div class="absolute inset-0 category-gradient opacity-70"></div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    @endpush
@endsection
