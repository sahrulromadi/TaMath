@extends('admin.admin')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4">Admin Dashboard</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Daftar Pertanyaan</h2>
            <a href="{{ route('admin.question.index') }}" class="text-blue-500 hover:text-blue-700">Lihat Daftar
                Pertanyaan</a>
        </div>
    </div>
@endsection
