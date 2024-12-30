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
            class="z-10 w-full max-w-4xl text-center space-y-10 
                bg-white bg-opacity-20 
                backdrop-blur-lg 
                rounded-3xl 
                p-12 
                shadow-2xl 
                animate-fade-in">

            {{-- Judul Kategori --}}
            <div class="mb-10">
                <h1
                    class="text-5xl font-bold 
                       text-transparent 
                       bg-clip-text 
                       bg-gradient-to-r 
                       from-[#FFD700] 
                       via-[#FF4500] 
                       to-[#FF1493]">
                    {{ $category->name }}
                </h1>
            </div>

            {{-- Grid Soal --}}
            <div class="grid grid-cols-5 gap-6">
                @foreach ($questions as $question)
                    <a href="{{ route('question', $question->slug) }}"
                        class="question-card 
                          w-full 
                          aspect-square 
                          flex 
                          items-center 
                          justify-center 
                          text-2xl 
                          font-bold 
                          text-white 
                          rounded-full 
                          transform 
                          transition 
                          duration-300 
                          hover:scale-110 
                          hover:shadow-2xl 
                          relative 
                          overflow-hidden">
                        <span class="relative z-10">{{ $loop->iteration }}</span>
                        <div class="absolute inset-0 question-gradient opacity-70"></div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
