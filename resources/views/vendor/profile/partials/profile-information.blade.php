<div class="col-xl-12">
    <div class="card mb-4">
        <h5 class="card-header">Profile Information</h5>
        <div class="card-body">
            <p>Update your account's profile information and email address.</p>
            <form wire:submit.prevent="submit" method="post">
                <div class="row">
                    <div class="col-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control my-2" id="name" wire:model="name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control my-2" id="email" wire:model="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <span class="text-center" wire:loading.remove>
                        Save
                    </span>
                    <div class="text-center" wire:loading wire:target='submit'>
                        <span class="spinner-border spinner-border-sm text-white" role="status">
                            <span class="visually-hidden"> Loading...</span>
                        </span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>