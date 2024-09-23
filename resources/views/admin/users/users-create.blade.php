<x-create-modal title="Create User">
    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name" wire:model='name' />
        @include('admin.error', ['property' => 'name'])
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" autocomplete="email" placeholder="exampel@gmail.com" name="email"
            wire:model='email' />
        @include('admin.error', ['property' => 'email'])
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" wire:model='password' />
        @include('admin.error', ['property' => 'password'])
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Role</label>
        <select class="form-control" name="role" wire:model='role'>
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
            <option value="vendor">Vendor</option>
        </select>
        <p class="text-primary">Note that role by default is user.</p>
        @include('admin.error', ['property' => 'role'])
    </div>
</x-create-modal>
