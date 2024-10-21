<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25" wire:model.live="search" id="" placeholder="Search...">
    </div>
    @if (count($announcements) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($announcements as $announcement)
                <tr id="notification-table-item">
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $announcements->links() }}
    </div>
    @else
    <div class="text-danger">No Requests.</div>
    @endif
</div>