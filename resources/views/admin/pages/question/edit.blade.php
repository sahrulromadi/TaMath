@extends('admin.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-4">Edit Question</h2>

        <form action="{{ route('admin.question.update', $question->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="question_text" class="block font-semibold">Question:</label>
                <input type="text" id="question_text" name="question_text" class="w-full px-4 py-2 border rounded-lg"
                    value="{{ old('question_text', $question->question_text) }}" required>
                @error('question_text')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
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
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <!-- Error Message -->
                @error('image')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
                <!-- Preview -->
                <div id="preview-container" class="mt-4 hidden">
                    <p class="text-sm font-medium text-gray-700">Preview:</p>
                    <img id="image-preview" src="#" alt="Preview Image"
                        class="mt-2 w-32 h-32 object-cover border border-gray-300 rounded-md shadow-md">
                </div>
            </div>

            <script>
                // Script for previewing the image
                document.getElementById('image').addEventListener('change', function(event) {
                    const previewContainer = document.getElementById('preview-container');
                    const previewImage = document.getElementById('image-preview');
                    const file = event.target.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewContainer.classList.remove('hidden');
                        };

                        reader.readAsDataURL(file);
                    } else {
                        previewContainer.classList.add('hidden');
                    }
                });
            </script>

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
