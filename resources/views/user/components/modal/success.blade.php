<div id="successModal"
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
                    from-green-500 
                    via-green-600 
                    to-green-700 
                    opacity-20 
                    -z-10">
        </div>

        {{-- Ikon Success --}}
        <div class="mb-6 flex justify-center">
            <div
                class="w-24 h-24 
                        bg-green-500 
                        text-white 
                        rounded-full 
                        flex 
                        items-center 
                        justify-center 
                        shadow-2xl 
                        animate-bounce">
                <i class="fas fa-check text-5xl"></i>
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
                   from-green-500 
                   to-green-700">
            Berhasil!
        </h3>

        {{-- Pesan Success --}}
        <p
            class="text-white 
                  text-lg 
                  mb-6 
                  px-4 
                  opacity-80">
            {{ session('success') }}
        </p>

        {{-- Tombol --}}
        <button onclick="closeSuccessModal()"
            class="px-10 
                       py-3 
                       bg-gradient-to-r 
                       from-green-500 
                       to-green-600 
                       text-white 
                       rounded-full 
                       hover:from-green-600 
                       hover:to-green-700 
                       transform 
                       hover:scale-105 
                       transition-all 
                       duration-300 
                       shadow-lg 
                       focus:outline-none 
                       focus:ring-2 
                       focus:ring-green-500 
                       focus:ring-opacity-50">
            Lanjutkan
        </button>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan modal
    function showSuccessModal() {
        const successModal = document.getElementById('successModal');
        successModal.classList.remove('opacity-0', 'pointer-events-none');
        successModal.classList.add('opacity-100', 'pointer-events-auto');

        // Animasi scale
        const modalContent = successModal.querySelector('div');
        modalContent.classList.remove('scale-90');
        modalContent.classList.add('scale-100');
    }

    // Fungsi untuk menutup modal
    function closeSuccessModal() {
        const successModal = document.getElementById('successModal');
        const modalContent = successModal.querySelector('div');

        // Animasi keluar
        modalContent.classList.add('scale-90');
        successModal.classList.remove('opacity-100', 'pointer-events-auto');
        successModal.classList.add('opacity-0', 'pointer-events-none');
    }

    // Jalankan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = "{{ session('success') }}";
        if (successMessage && successMessage.trim() !== '') {
            showSuccessModal();
        }
    });

    // Tambahan: Tutup modal dengan klik di luar
    document.addEventListener('DOMContentLoaded', () => {
        const successModal = document.getElementById('successModal');
        successModal.addEventListener('click', (e) => {
            if (e.target === successModal) {
                closeSuccessModal();
            }
        });
    });
</script>
