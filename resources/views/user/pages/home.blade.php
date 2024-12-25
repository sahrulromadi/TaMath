@extends('user.app')

@section('content')
    <div
        class="flex justify-center items-center h-screen bg-gradient-to-r from-teal-300 via-lime-200 to-pink-200 text-gray-800">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-6 text-gray-900">TaMath: Game Matematika</h1>
            <p class="text-lg mb-6 text-gray-700">Latihan Matematika yang Menyenangkan! Selesaikan soal-soal untuk
                meningkatkan kemampuan matematika Anda.</p>

            <a href="#"
                class="px-6 py-3 bg-teal-400 text-xl rounded-lg hover:bg-teal-500 transition-colors duration-300">
                Selesaikan Game
            </a>
        </div>
    </div>
@endsection
