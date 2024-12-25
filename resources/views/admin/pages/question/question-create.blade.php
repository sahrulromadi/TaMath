@extends('admin.admin')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4">Buat Pertanyaan Baru</h1>

        <form action="{{ route('admin.question.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <input type="text" name="question" id="question"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('question') }}" required>
            </div>

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
