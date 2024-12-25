@extends('admin.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-4">Detail Question</h2>

        <div class="mb-4">
            <label class="font-bold">Question:</label>
            <p>{{ $question->question_text }}</p>
        </div>

        <div class="mb-4">
            <label class="font-bold">Image</label>
            <div class="mt-2">
                @if (isset($question->image) && Storage::disk('public')->exists($question->image))
                    <img src="{{ Storage::url($question->image) }}" alt="Question Image"
                        class="w-32 h-32 object-cover border border-gray-300 rounded-md shadow-md">
                @else
                    <p class="text-gray-500">No image available.</p>
                @endif
            </div>
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
