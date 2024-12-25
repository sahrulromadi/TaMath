<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Sukses!</h3>
        <p class="text-gray-600">{{ session('success') }}</p>
        <button onclick="closeSuccessModal()"
            class="mt-6 px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition-colors">
            OK
        </button>
    </div>
</div>

<script>
    function closeSuccessModal() {
        const successModal = document.getElementById('successModal');
        successModal.classList.add('hidden');
    }
</script>
