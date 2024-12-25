@extends('admin.admin')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4">Buat Pertanyaan Baru</h1>

        <form action="{{ route('admin.question.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="question_text" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <input type="text" name="question_text" id="question_text"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('question_text') }}" required>
                @error('question_text')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
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
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category_id" id="category_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4">
                <label for="options" class="block text-sm font-medium text-gray-700">Pilihan Jawaban</label>
                <div id="options">
                    <div class="flex mb-2">
                        <input type="text" name="options[]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm"
                            placeholder="Pilihan 1" required>
                    </div>
                    <div class="flex mb-2">
                        <input type="text" name="options[]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm"
                            placeholder="Pilihan 2" required>
                    </div>
                    <div class="flex mb-2">
                        <input type="text" name="options[]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm"
                            placeholder="Pilihan 3" required>
                    </div>
                    <div class="flex mb-2">
                        <input type="text" name="options[]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm"
                            placeholder="Pilihan 4" required>
                    </div>
                </div>
            </div> --}}

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Simpan Pertanyaan</button>
        </form>
    </div>
@endsection
