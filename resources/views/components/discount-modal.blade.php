<!-- Modal -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='submit'>
                <div class="modal-body">
                    <div class="row">
                        {{ $slot }}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <span class="text-center" wire:loading.remove>
                            Create
                        </span>
                        <div class="text-center" wire:loading wire:target='submit'>
                            <span class="spinner-border spinner-border-sm text-white" role="status">
                                <span class="visually-hidden"> Loading...</span>
                            </span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
