<x-show-modal id="deleteModal" title="Delete Size">
    <form wire:submit.prevent="submit" method="post">
        <div class="modal-body">
            Are You Sure To Delete This Size?
        </div>
        <div class="modal-footer mt-3">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-danger">
                <span class="text-center" wire:loading.remove>
                    Delete
                </span>
                <div class="text-center" wire:loading wire:target='submit'>
                    <span class="spinner-border spinner-border-sm text-white" role="status">
                        <span class="visually-hidden"> Loading...</span>
                    </span>
                </div>
            </button>
        </div>
    </form>
</x-show-modal>