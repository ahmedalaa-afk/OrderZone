<div class="col-xl-6">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" wire:submit.prevent="submit">
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Vendor Registration Date</h5>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="start_at" class="col-md-2 col-form-label">Start At:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="datetime-local" id="start_at" wire:model="start_at" />
                        @error('start_at') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="end_at" class="col-md-2 col-form-label">End At:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="datetime-local" id="end_at" wire:model="end_at" />
                        @error('end_at') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
