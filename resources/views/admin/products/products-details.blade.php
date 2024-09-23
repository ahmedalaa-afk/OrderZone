<x-show-modal id="showModal" title="Product Details">
    @if (is_array($product) || is_object($product))
    <div class="mb-3 mt-3">
        Title: <span>{{ $product->title }}</span>
    </div>
    <div class="mb-3 mt-3">
        description: <span>{{ $product->description }}</span>
    </div>
    <div class="mb-3 mt-3">
        price: <span>{{ $product->price }}</span>
    </div>
    <div class="mb-3 mt-3">
        quantity: <span>{{ $product->quantity }}</span>
    </div>
    <div class="row">
        <div class="col-md">
            <h5 class="my-4">Photos</h5>

            <div id="carouselExample" class="carousel slide custom-carousel" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($product->photos as $index => $photo)
                    <li data-bs-target="#carouselExample" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach ($product->photos as $index => $photo)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img class="w-100" src="{{ Storage::url($photo->photo) }}" alt="Product Photo">
                    </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>


    <div class="mb-3 mt-3">

        <a class="btn btn-primary" href="#" wire:click.prevent="$dispatch('acceptProduct')">
            Accept
        </a>

        <a class="btn btn-primary" href="#" wire:click.prevent="$dispatch('rejectProduct')">
            Reject
        </a>
    </div>

    @else
    <!-- Handle case when $notification is not iterable -->
    <p>No notifications available.</p>
    @endif
</x-show-modal>