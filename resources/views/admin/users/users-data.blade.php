<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25" wire:model.live="search" id="" placeholder="Search...">
    </div>
    @if (count($users) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                        {{ $role->name }}
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-primary" href="#"
                            wire:click.prevent="$dispatch('changeUserStatus', { id: '{{ $user->id }}' })">
                            {{ $user->status }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
    @else
    <div class="text-danger">No users found.</div>
    @endif
</div>