<div id="errorModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h3 class="text-2xl font-bold mb-4 text-red-600">Error!</h3>
        <p class="text-gray-600">{{ session('error') }}</p>
        <button onclick="closeErrorModal()"
            class="mt-6 px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
            OK
        </button>
    </div>
</div>

<script>
    function closeErrorModal() {
        const errorModal = document.getElementById('errorModal');
        errorModal.classList.add('hidden');
    }
</script>
