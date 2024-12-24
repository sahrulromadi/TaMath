<div id="logoutModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h3 class="text-2xl font-bold mb-4 text-red-600">Konfirmasi Logout</h3>
        <p class="text-gray-600">Apakah Anda yakin ingin logout?</p>
        <div class="space-x-4">
            <!-- Form Logout -->
            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    Ya, Logout
                </button>
            </form>
            <!-- Tombol Batal -->
            <button id="cancelButton"
                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                Batal
            </button>
        </div>
    </div>
</div>

<script>
    // JavaScript untuk menampilkan modal saat tombol logout ditekan
    document.addEventListener('DOMContentLoaded', function() {
        const logoutButton = document.getElementById('logoutButton');
        const logoutModal = document.getElementById('logoutModal');
        const cancelButton = document.getElementById('cancelButton');

        // Tampilkan modal saat tombol logout diklik
        logoutButton.addEventListener('click', function() {
            logoutModal.classList.remove('hidden');
        });

        // Sembunyikan modal saat tombol batal diklik
        cancelButton.addEventListener('click', function() {
            logoutModal.classList.add('hidden');
        });
    });
</script>
