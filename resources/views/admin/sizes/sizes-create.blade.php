<x-show-modal id="createSizeModal" title="New Size">
    <form wire:submit.prevent="submit" method="post">
        <div class="row">
            <div class="col-6">
                <label for="size">Size:</label>
                <input type="text" class="form-control" id="size" wire:model="size" wire:model='size'>
                @include('admin.error', ['property' => 'size'])
            </div>

            <div class="modal-footer mt-3">
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
        </div>
    </form>
</x-show-modal>