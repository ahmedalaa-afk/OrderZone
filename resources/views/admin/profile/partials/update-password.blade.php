<div class="col-xl-12">
    <div class="card mb-4">
        <h5 class="card-header">Update Password</h5>
        <div class="card-body">
            <p>Ensure your account is using a long, random password to stay secure.</p>
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
                <div class="row">
                    <div class="col-4">
                        <label for="password">New Password</label>
                        <input type="text" class="form-control my-2" id="password" wire:model="password">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="text" class="form-control my-2" id="password_confirmation" wire:model="password_confirmation">
                        @error('password_confirmation')
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