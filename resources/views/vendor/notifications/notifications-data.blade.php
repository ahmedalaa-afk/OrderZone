<div>
    @if (count($notifications) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($notifications as $notification)
                <tr id="notification-table-item">
                    <td>{{ $notification->data['message'] }}</td>
                    <td>
                        <a href="#" class="btn btn-danger" wire:click.prevent='$dispatch("deleteMessage",{id: "{{$notification->id}}"})'>
                            <i class="bx bx-trash me-1"></i>
                            Delete
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