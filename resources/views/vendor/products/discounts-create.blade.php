<x-discount-modal title="Create Discount">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-danger" :status="session('status')" />
    <div class="col-md-6 mb-3">
        <label class="form-label">Type</label>
        <select class="form-control" name="role" wire:model='type'>
            <option value="product" selected>Product</option>
            <option value="weekly">Week</option>
        </select>
        <p class="text-primary my-2">Note that type by default is product.</p>
        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
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