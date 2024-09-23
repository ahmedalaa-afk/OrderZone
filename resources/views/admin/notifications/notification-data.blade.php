<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25" wire:model.live="search" id="" placeholder="Search...">
    </div>
    @if (count($notifications) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Information</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($notifications as $notification)
                <tr id="notification-table-item">
                    <td>{{ $notification->data['message'] }}</td>
                    <td>{{ $notification->data['name'] }}</td>
                    <td>{{ $notification->data['email'] }}</td>
                    <td>{{ $notification->status }}</td>
                    <td>
                        <a class="btn btn-primary" href="#" style="margin-left: -170px"
                            wire:click.prevent="$dispatch('notificationShow', { id: '{{ $notification->id }}' })">
                            <i class="bx bx-show me-1"></i> Show
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $notifications->links() }}
    </div>
    @else
    <div class="text-danger">No Requests.</div>
    @endif
</div>