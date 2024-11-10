<x-show-modal id="createColorModal" title="New Color">
    <form wire:submit.prevent="submit" method="post">
        <div class="row">
            <div class="col-6">
                <label for="color">Color:</label>
                <input type="text" class="form-control" id="color" wire:model="color" wire:model='color'>
                @include('admin.error', ['property' => 'color'])
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