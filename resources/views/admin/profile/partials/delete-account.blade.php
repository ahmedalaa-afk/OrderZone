<div class="col-xl-12">
    <div class="card mb-4">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
            <p>Once your account is deleted, all of its resources and data will be permanently deleted. <br>
                 Before deleting your account, please download any data or information that you wish to retain.</p>
            <form wire:submit.prevent="submit" method="post">
                <div class="row">
                    <div class="col-4">
                        <label for="current_password">Current Password</label>
                        <input type="text" class="form-control my-2" id="current_password" wire:model="current_password">
                        @error('current_password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">
                    <span class="text-center" wire:loading.remove>
                        Delete Account
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