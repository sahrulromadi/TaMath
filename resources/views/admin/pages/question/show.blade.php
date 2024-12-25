@extends('admin.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-4">Detail Question</h2>

        <div class="mb-4">
            <label class="font-bold">Question:</label>
            <p>{{ $question->question }}</p>
        </div>

        <div class="mb-4">
            <label class="font-bold">Category:</label>
            <p>{{ $question->category->name }}</p>
        </div>

        {{-- <div class="mb-4">
            <label class="font-bold">Options:</label>
            <ul class="list-disc pl-5">
                @foreach ($question->options as $option)
                    <li>{{ $option->option }}</li>
                @endforeach
            </ul>
        </div> --}}

        <div class="text-center mt-6">
            <a href="{{ route('admin.question.index') }}"
                class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Back to Questions List</a>
        </div>
    </div>
@endsection
