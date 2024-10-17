<x-show-modal id="showModal" title="Notification Details">
    <form wire:submit.prevent="submit" method="post">
        @if (is_array($notification) || is_object($notification))
        <div class="mb-3">
            Name: <span>{{ $notification->data['name'] }}</span>
            
        </div>
        <div class="mb-3">
            Email: <span>{{ $notification->data['email'] }}</span>
        </div>
        <div class="mb-3">
            Phone: <span>{{ $notification->data['phone'] ?? 'No Phone' }}</span>
        </div>
        <div class="mb-3">
            Country: <span>{{ $notification->data['country'] }}</span>
        </div>
        <div class="mb-3 mt-3">
            Identity Front: <img width="300" src="{{ Storage::url($notification->data['identity_front']) }}" alt="">
        </div>
        <div class="mb-3 mt-3">

            Identity Back: <img width="300" src="{{ Storage::url($notification->data['identity_back']) }}" alt="">
        </div>

        <div class="mb-3 mt-3">

            <a class="btn btn-primary" href="#" wire:click.prevent="$dispatch('acceptVendor')">
                Accept
            </a>

            <a class="btn btn-primary" href="#" wire:click.prevent="$dispatch('rejectVendor')">
                Reject
            </a>
        </div>

        @else
        <!-- Handle case when $notification is not iterable -->
        <p>No notifications available.</p>
        @endif
    </form>
</x-show-modal>