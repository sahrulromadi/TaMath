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
            class="z-10 w-full max-w-4xl text-center space-y-10 
                bg-white bg-opacity-20 
                backdrop-blur-lg 
                rounded-3xl 
                p-12 
                shadow-2xl 
                animate-fade-in">

            {{-- Pesan Error --}}
            <div class="mb-10">
                <h1
                    class="text-6xl font-bold 
                       text-transparent 
                       bg-clip-text 
                       bg-gradient-to-r 
                       from-[#FFD700] 
                       via-[#FF4500] 
                       to-[#FF1493] 
                       leading-relaxed">
                    404
                </h1>
                <h2 class="text-3xl font-semibold text-gray-800">
                    Oops! Halaman tidak ditemukan.
                </h2>
            </div>

            {{-- Deskripsi --}}
            <p class="text-lg text-gray-600 mb-4">
                Halaman yang Anda cari mungkin telah dihapus, dipindahkan, atau tidak tersedia.
            </p>
        </div>
    </div>
@endsection
