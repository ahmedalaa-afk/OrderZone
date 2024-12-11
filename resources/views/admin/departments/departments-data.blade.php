<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25 d-inline me-3" wire:model.live="search" placeholder="Search...">
        @if ($showArchived)
        <button class="btn btn-primary" wire:click="showArchivedDepartments">
            Active Departments <i class="bx bx-list-ul me-1"></i>
        </button>
        @else
        <button type="submit" class="btn btn-secondary" wire:click="showArchivedDepartments">
            Archived Departments <i class="bx bx-trash me-1"></i>
        </button>
        @endif
    </div>
    @if (count($departments) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('deleteDepartment', { id: {{ $department->id }} })">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('editDepartment', { id: {{ $department->id }} })">
                                    <i class="bx bx-edit me-1"></i> Edit
                                </a>
                                @if ($department->deleted_at)
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('restoreDepartment', { id: {{ $department->id }} })">
                                    <i class="bx bx-refresh me-1"></i> Restore
                                </a>
                                @endif
                            </div>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $departments->links() }}
    </div>
    @else
    <div class="text-danger">No Category found.</div>
    @endif
</div>