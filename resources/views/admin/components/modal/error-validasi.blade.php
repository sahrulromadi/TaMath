<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal-error" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border border-danger rounded-3 shadow-lg">
            <div class="modal-header bg-danger text-white border-bottom-0 p-4">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-exclamation-circle me-2"></i>Error
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-dark">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="mb-2">
                            <i class="bi bi-exclamation-circle text-danger"></i> {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer border-top-0 p-3">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Script untuk menampilkan modal secara otomatis jika ada error -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = "{{ $errors->any() }}"; // Cek apakah ada error
        if (errorMessage) {
            var modal = new bootstrap.Modal(document.getElementById('modal'));
            modal.show();
        }
    });
</script>
