@extends('admin.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-4">Edit Question</h2>

        <form action="{{ route('admin.question.update', $question->slug) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="question" class="block font-semibold">Question:</label>
                <input type="text" id="question" name="question" class="w-full px-4 py-2 border rounded-lg"
                    value="{{ old('question', $question->question) }}" required>
                @error('question')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block font-semibold">Category:</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $question->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4">
                <label for="options" class="block font-semibold">Options:</label>
                <div class="space-y-2">
                    @foreach ($question->options as $index => $option)
                        <input type="text" name="options[]" class="w-full px-4 py-2 border rounded-lg"
                            value="{{ old('options.' . $index, $option->option) }}" required>
                    @endforeach
                </div>
                @error('options')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="flex justify-center space-x-4">
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-700">Update
                    Question</button>
                <a href="{{ route('admin.question.index') }}"
                    class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection
