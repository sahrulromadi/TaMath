<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalSuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-success text-white d-flex align-items-center">
                <i class="fas fa-check-circle me-2 fs-4"></i>
                <h5 class="modal-title" id="modalSuccessLabel">Success</h5>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-check-circle text-success fs-1 mb-3"></i>
                <p class="mb-0 fs-5">{{ session('success') }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success px-4 py-2" data-bs-dismiss="modal">
                    <i class="fas fa-check me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Script untuk menampilkan modal secara otomatis jika ada session success -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = "{{ session('success') }}";
        if (successMessage && successMessage.trim() !== '') {
            var modal = new bootstrap.Modal(document.getElementById('modal'));
            modal.show();
        }
    });
</script>
