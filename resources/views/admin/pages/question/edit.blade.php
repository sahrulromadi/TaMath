@extends('admin.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Question</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <span>Question</span>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <span>Edit</span>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Question</div>
                        </div>
                        <form action="{{ route('admin.question.update', $question->slug) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- category --}}
                                        <div class="form-group form-group-default">
                                            <label>Pilih Kelas</label>
                                            <select class="form-select" name="category_id" required>
                                                <option value="">Pilih Kelas</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $question->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- category end --}}

                                        {{-- options --}}
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between mb-2">
                                                <label for="options" class="form-label">Pilihan Jawaban</label>
                                                <div id="add-option" class="text-primary" style="cursor: pointer">Tambah
                                                    Opsi</div>
                                            </div>
                                            <div id="options">
                                                {{-- Template Opsi --}}
                                                @foreach ($question->options as $index => $option)
                                                    <div class="input-group mb-2 option-row">
                                                        <input type="text" class="form-control" name="options[]"
                                                            placeholder="Masukkan pilihan jawaban"
                                                            aria-label="Pilihan jawaban" value="{{ $option->option_text }}"
                                                            required>
                                                        <div class="input-group-text">
                                                            <input type="radio" name="correct_option"
                                                                value="{{ $index }}"
                                                                {{ $option->is_correct ? 'checked' : '' }}
                                                                aria-label="Tandai sebagai jawaban benar">
                                                        </div>
                                                        <button class="btn btn-danger btn-remove-option ms-4 rounded-3"
                                                            type="button"><i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- options end --}}
                                    </div>
                                    <div class="col-md-6">
                                        {{-- image --}}
                                        <div>
                                            <img src="{{ asset('storage/' . $question->image) }}" alt="Preview Image"
                                                class="img-fluid" style="max-height: 200px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="imageInput">Upload Image</label>
                                            <input type="file" class="form-control-file" id="imageInput" name="image"
                                                accept="image/*" />
                                        </div>
                                        <div class="form-group mt-3">
                                            <img id="imagePreview" src="#" alt="Preview Image"
                                                class="img-fluid d-none" style="max-height: 200px;" />
                                        </div>
                                        {{-- image end --}}

                                        {{-- question_text --}}
                                        <div class="form-group form-group-default">
                                            <label>Question</label>
                                            <textarea class="form-control" rows="5" name="question_text" placeholder="Type question here...">{{ old('question_text', $question->question_text) }}</textarea>
                                        </div>
                                        {{-- question_text end --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-action d-flex flex-row justify-content-end gap-3">
                                <button class="btn btn-success" type="submit">Update</button>
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const optionsContainer = document.getElementById('options');
            const addOptionButton = document.getElementById('add-option');
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            // Membatasi jumlah opsi hingga 4
            const maxOptions = 4;

            // Fungsi untuk memperbarui visibilitas tombol tambah opsi
            const updateAddOptionButtonVisibility = () => {
                const optionCount = optionsContainer.querySelectorAll('.option-row').length;
                if (optionCount >= maxOptions) {
                    addOptionButton.style.display = 'none'; // Sembunyikan tombol jika jumlah opsi >= 4
                } else {
                    addOptionButton.style.display = 'inline-block'; // Tampilkan tombol jika jumlah opsi < 4
                }
            };

            // Periksa jumlah opsi saat halaman dimuat pertama kali
            updateAddOptionButtonVisibility();

            // Tambahkan event listener untuk tombol "Tambah Opsi"
            addOptionButton.addEventListener('click', () => {
                const optionCount = optionsContainer.querySelectorAll('.option-row').length;

                // Hanya tambahkan opsi jika jumlahnya kurang dari 4
                if (optionCount < maxOptions) {
                    // Buat elemen baru untuk opsi
                    const newOption = document.createElement('div');
                    newOption.className = 'input-group mb-2 option-row';
                    newOption.innerHTML = `
                    <input 
                        type="text" 
                        class="form-control" 
                        name="options[]" 
                        placeholder="Masukkan pilihan jawaban" 
                        aria-label="Pilihan jawaban" 
                        required>
                    <div class="input-group-text">
                        <input 
                            type="radio" 
                            name="correct_option" 
                            value="${optionCount}" 
                            aria-label="Tandai sebagai jawaban benar">
                    </div>
                    <button class="btn btn-danger btn-remove-option ms-4 rounded-3" type="button"><i class="fas fa-trash-alt"></i></button>
                `;

                    // Tambahkan opsi baru ke dalam container
                    optionsContainer.appendChild(newOption);

                    // Tambahkan event listener untuk tombol hapus
                    addRemoveEvent(newOption.querySelector('.btn-remove-option'));
                }

                // Update visibilitas tombol setelah opsi ditambahkan
                updateAddOptionButtonVisibility();
            });

            // Fungsi untuk menambahkan event listener pada tombol hapus
            const addRemoveEvent = (button) => {
                button.addEventListener('click', () => {
                    button.closest('.option-row').remove();
                    // Update visibilitas tombol setelah opsi dihapus
                    updateAddOptionButtonVisibility();
                });
            };

            // Tambahkan event listener untuk semua tombol hapus yang sudah ada
            document.querySelectorAll('.btn-remove-option').forEach(addRemoveEvent);

            // Event listener untuk menampilkan preview gambar
            imageInput.addEventListener('change', (event) => {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('d-none'); // Tampilkan preview
                    };

                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '#';
                    imagePreview.classList.add('d-none'); // Sembunyikan preview jika tidak ada file
                }
            });
        });
    </script>
@endsection
