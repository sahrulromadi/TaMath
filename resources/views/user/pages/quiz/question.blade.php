@extends('user.app')

@section('content')
    <div
        class="h-screen w-full flex flex-col justify-center items-center 
            bg-gradient-to-br from-[#6A5ACD] via-[#4169E1] to-[#1E90FF] 
            overflow-hidden relative">

        {{-- Tombol Previous --}}
        <x-previous :route="route('list-soal', $question->category->name)" />

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

            {{-- Pertanyaan --}}
            <div class="mb-10">
                <h1
                    class="text-3xl font-bold 
                       text-transparent 
                       bg-clip-text 
                       bg-gradient-to-r 
                       from-[#FFD700] 
                       via-[#FF4500] 
                       to-[#FF1493] 
                       leading-relaxed">
                    {{ $question->question_text }}
                </h1>
            </div>

            {{-- Form Jawaban --}}
            <form id="answerForm" method="POST" action="{{ route('submit-answer') }}" class="space-y-8">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <input type="hidden" name="selected_option" id="selectedOption">

                {{-- Grid Opsi --}}
                <div class="grid grid-cols-2 gap-6">
                    @foreach ($question->options as $option)
                        <div class="option-item 
                                flex 
                                justify-center 
                                items-center 
                                p-6 
                                text-xl 
                                font-semibold 
                                text-white 
                                rounded-2xl 
                                cursor-pointer 
                                transition 
                                duration-300 
                                transform 
                                hover:scale-105 
                                relative 
                                overflow-hidden"
                            data-option-id="{{ $option->id }}" onclick="selectOption({{ $option->id }})">
                            <span class="relative z-10">{{ $option->option_text }}</span>
                            <div class="absolute inset-0 option-gradient opacity-70"></div>
                        </div>
                    @endforeach
                </div>

                {{-- Tombol Submit Tersembunyi --}}
                <button type="submit" id="submitBtn" class="hidden">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function selectOption(optionId) {
            // Hapus kelas dari semua opsi
            document.querySelectorAll('.option-item').forEach(el => {
                el.classList.remove('bg-green-500');
                el.classList.remove('scale-110');
                el.classList.add('hover:scale-105');
            });

            // Tambahkan kelas pada opsi yang dipilih
            const selectedEl = document.querySelector(`[data-option-id="${optionId}"]`);
            selectedEl.classList.remove('hover:scale-105');
            selectedEl.classList.add('scale-110');

            // Set nilai input tersembunyi
            document.getElementById('selectedOption').value = optionId;

            // Tambahkan efek visual
            selectedEl.classList.add('ring-4', 'ring-white', 'ring-opacity-50');

            // Otomatis submit dengan delay untuk efek visual
            setTimeout(() => {
                document.getElementById('answerForm').submit();
            }, 300);
        }

        // Tambahan interaksi
        document.addEventListener('DOMContentLoaded', () => {
            const optionItems = document.querySelectorAll('.option-item');

            optionItems.forEach(item => {
                item.addEventListener('mouseenter', () => {
                    item.classList.add('shadow-2xl');
                });

                item.addEventListener('mouseleave', () => {
                    item.classList.remove('shadow-2xl');
                });
            });
        });
    </script>
@endsection
