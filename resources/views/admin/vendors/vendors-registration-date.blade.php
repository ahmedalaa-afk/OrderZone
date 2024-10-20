<div class="col-xl-6">
    <form method="post" wire:submit.prevent='submit'>
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Vendor Registration Date</h5>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="start_at" class="col-md-2 col-form-label">Start At:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="datetime-local" id="start_at" wire:model='start_at' />
                        @include('admin.error', ['property' =>'start_at'])
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="end_at" class="col-md-2 col-form-label">End At:</label>
                    <div class="col-md-10">
                        <input class="form-control" type="datetime-local" id="end_at" wire:model='end_at' />
                        @include('admin.error', ['property' =>'end_at'])
                    </div>
                </div>
                <button class="btn btn-primary" wire:click='submit'>Save</button>
            </div>
        </div>
    </form>
</div>