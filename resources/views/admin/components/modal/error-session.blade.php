<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalErrorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-danger text-white d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2 fs-4"></i>
                <h5 class="modal-title" id="modalErrorLabel">Error</h5>
                <button type="button" class="btn-close text-white ms-auto" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-times-circle text-danger fs-1 mb-3"></i>
                <p class="mb-0 fs-5">{{ session('error') }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger px-4 py-2" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>
