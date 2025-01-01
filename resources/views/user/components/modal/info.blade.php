<div id="infoModal"
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
                    from-blue-500 
                    via-blue-600 
                    to-blue-700 
                    opacity-20 
                    -z-10">
        </div>

        {{-- Ikon Info --}}
        <div class="mb-6 flex justify-center">
            <div
                class="w-24 h-24 
                        bg-blue-500 
                        text-white 
                        rounded-full 
                        flex 
                        items-center 
                        justify-center 
                        shadow-2xl 
                        animate-pulse">
                <i class="fas fa-info-circle text-5xl"></i>
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
                   from-blue-500 
                   to-blue-700">
            Informasi
        </h3>

        {{-- Pesan Info --}}
        <p
            class="text-white 
                  text-lg 
                  mb-6 
                  px-4 
                  opacity-80">
            {{ session('info') }}
        </p>

        {{-- Tombol --}}
        <button onclick="closeInfoModal()"
            class="px-10 
                       py-3 
                       bg-gradient-to-r 
                       from-blue-500 
                       to-blue-600 
                       text-white 
                       rounded-full 
                       hover:from-blue-600 
                       hover:to-blue-700 
                       transform 
                       hover:scale-105 
                       transition-all 
                       duration-300 
                       shadow-lg 
                       focus:outline-none 
                       focus:ring-2 
                       focus:ring-blue-500 
                       focus:ring-opacity-50">
            Mengerti
        </button>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan modal
    function showInfoModal() {
        const infoModal = document.getElementById('infoModal');
        infoModal.classList.remove('opacity-0', 'pointer-events-none');
        infoModal.classList.add('opacity-100', 'pointer-events-auto');

        // Animasi scale
        const modalContent = infoModal.querySelector('div');
        modalContent.classList.remove('scale-90');
        modalContent.classList.add('scale-100');
    }

    // Fungsi untuk menutup modal
    function closeInfoModal() {
        const infoModal = document.getElementById('infoModal');
        const modalContent = infoModal.querySelector('div');

        // Animasi keluar
        modalContent.classList.add('scale-90');
        infoModal.classList.remove('opacity-100', 'pointer-events-auto');
        infoModal.classList.add('opacity-0', 'pointer-events-none');
    }

    // Jalankan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var infoMessage = "{{ session('info') }}";
        if (infoMessage && infoMessage.trim() !== '') {
            showInfoModal();
        }
    });
</script>
