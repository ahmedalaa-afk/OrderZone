<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25 d-inline me-3" wire:model.live="search" placeholder="Search...">
        @if ($showArchived)
        <button class="btn btn-primary" wire:click="showArchivedCategories()">
            Active Categories <i class="bx bx-list-ul me-1"></i>
        </button>
        @else
        <button type="submit" class="btn btn-secondary" wire:click="showArchivedCategories()">
            Archived Categories <i class="bx bx-trash me-1"></i>
        </button>
        @endif
    </div>

    @if (count($categories) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->department_id }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('deleteCategory', { id: {{ $category->id }} })">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('editCategory', { id: {{ $category->id }} })">
                                    <i class="bx bx-edit me-1"></i> Edit
                                </a>
                                @if ($category->deleted_at)
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('deleteCategory', { id: {{ $category->id }} })">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('restoreCategory', { id: {{ $category->id }} })">
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
        {{ $categories->links() }}
    </div>
    @else
    <div class="text-danger">No Category found.</div>
    @endif
</div>