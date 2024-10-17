<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25" wire:model.live="search" id="" placeholder="Search...">
    </div>
    @if (count($vendors) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Make Meeting</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>
                        @foreach ($vendor->roles as $role)
                        {{ $role->name }}
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-primary" href="#"
                            wire:click.prevent="$dispatch('vendorStatus', { id: {{ $vendor->id }} })">
                            <i class='bx bx-reset me-1'></i>
                            {{$vendor->status}}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="#"
                            wire:click.prevent="$dispatch('meetVendor', { id: {{ $vendor->id }} })"><i
                                class='bx bxl-zoom'></i>
                            Meet</a>
                    </td>
                    <td>
                        @role('vendor_manager','admin')
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('deleteVendor', { id: {{ $vendor->id }} })"><i
                                        class="bx bx-trash me-1"></i>
                                    Delete</a>
                            </div>
                        </div>
                        @endrole
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vendors->links() }}
    </div>
    @else
    <div class="text-danger">No users found.</div>
    @endif
</div>