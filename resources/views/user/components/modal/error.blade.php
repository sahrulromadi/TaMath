<div id="errorModal"
    class="fixed inset-0 flex items-center justify-center 
                             bg-black bg-opacity-50 z-[9999] 
                             opacity-0 pointer-events-none 
                             transition-all duration-300 ease-in-out">
    <div
        class="bg-white 
                bg-opacity-20 
                backdrop-blur-lg 
                rounded-3xl 
                shadow-2xl 
                border 
                border-white 
                border-opacity-20 
                p-8 
                text-center 
                transform 
                scale-90 
                transition-all 
                duration-300 
                ease-in-out 
                max-w-md 
                w-full 
                relative 
                overflow-hidden">

        {{-- Gradient Background --}}
        <div
            class="absolute inset-0 
                    bg-gradient-to-br 
                    from-red-500 
                    via-red-600 
                    to-red-700 
                    opacity-20 
                    -z-10">
        </div>

        {{-- Ikon Error --}}
        <div class="mb-6 flex justify-center">
            <div
                class="w-24 h-24 
                        bg-red-500 
                        text-white 
                        rounded-full 
                        flex 
                        items-center 
                        justify-center 
                        shadow-2xl 
                        animate-pulse">
                <i class="fas fa-exclamation-triangle text-5xl"></i>
            </div>
        </div>

        {{-- Judul --}}
        <h3
            class="text-3xl 
                   font-bold 
                   mb-4 
                   text-transparent 
                   bg-clip-text 
                   bg-gradient-to-r 
                   from-red-500 
                   to-red-700">
            Terjadi Kesalahan
        </h3>

        {{-- Pesan Error --}}
        <p
            class="text-white 
                  text-lg 
                  mb-6 
                  px-4 
                  opacity-80">
            {{ session('error') }}
        </p>

        {{-- Tombol --}}
        <button onclick="closeErrorModal()"
            class="px-10 
                       py-3 
                       bg-gradient-to-r 
                       from-red-500 
                       to-red-600 
                       text-white 
                       rounded-full 
                       hover:from-red-600 
                       hover:to-red-700 
                       transform 
                       hover:scale-105 
                       transition-all 
                       duration-300 
                       shadow-lg 
                       focus:outline-none 
                       focus:ring-2 
                       focus:ring-red-500 
                       focus:ring-opacity-50">
            Mengerti
        </button>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan modal
    function showErrorModal() {
        const errorModal = document.getElementById('errorModal');
        errorModal.classList.remove('opacity-0', 'pointer-events-none');
        errorModal.classList.add('opacity-100', 'pointer-events-auto');

        // Animasi scale
        const modalContent = errorModal.querySelector('div');
        modalContent.classList.remove('scale-90');
        modalContent.classList.add('scale-100');
    }

    // Fungsi untuk menutup modal
    function closeErrorModal() {
        const errorModal = document.getElementById('errorModal');
        const modalContent = errorModal.querySelector('div');

        // Animasi keluar
        modalContent.classList.add('scale-90');
        errorModal.classList.remove('opacity-100', 'pointer-events-auto');
        errorModal.classList.add('opacity-0', 'pointer-events-none');
    }

    // Jalankan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = "{{ session('error') }}";
        if (errorMessage && errorMessage.trim() !== '') {
            showErrorModal();
        }
    });
</script>
