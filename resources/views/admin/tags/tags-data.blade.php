<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25" wire:model.live="search" id="" placeholder="Search...">
    </div>
    @if (count($tags) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"
                                    wire:click.prevent="$dispatch('deleteTag', { id: {{ $tag->id }} })">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
    @else
    <div class="text-danger">No Tag found.</div>
    @endif
</div>