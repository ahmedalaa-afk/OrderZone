<x-discount-modal title="Create Discount">
    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="name" wire:model='name' />
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="start_at" class="col-md-2 col-form-label">Start At:</label>
        <div class="col-md-10">
            <input class="form-control" type="datetime-local" id="start_at" wire:model="start_at" />
            @error('start_at') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="end_at" class="col-md-2 col-form-label">End At:</label>
        <div class="col-md-10">
            <input class="form-control" type="datetime-local" id="end_at" wire:model="end_at" />
            @error('end_at') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Amount</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="amount" wire:model='amount' />
            @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
</x-discount-modal>