@extends('admin.admin')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4">Daftar Pertanyaan</h1>

        <div class="mb-4">
            <a href="{{ route('admin.question.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Buat
                Pertanyaan Baru</a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Pertanyaan</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td class="border px-4 py-2">{{ $question->id }}</td>
                            <td class="border px-4 py-2">{{ $question->question_text }}</td>
                            <td class="border px-4 py-2">{{ $question->category->name }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.question.show', $question->slug) }}"
                                    class="text-blue-500 hover:text-blue-700">show</a>
                                |
                                <a href="{{ route('admin.question.edit', $question->slug) }}"
                                    class="text-blue-500 hover:text-blue-700">Edit</a>
                                |
                                <form action="{{ route('admin.question.destroy', $question->slug) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
