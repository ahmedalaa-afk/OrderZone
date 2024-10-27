<div class="col-lg-8 offset-lg-1">
    <div class="filter-control">
        {{-- <ul>
            @foreach ($categories as $index => $category)
            <li class="{{ $key == $category->name ? 'active' : '' }}" wire:key="{{ $index }}"
                wire:click.prevent="$dispatch('filterProducts', { key: '{{ $category->name }}' })">
                {{ str_replace('-', ' ', $category->name) }}
            </li>
            @endforeach
        </ul> --}}
    </div>
    <div class="product-slider owl-carousel" wire:ignore>
        @if (count($products) > 0)
        @foreach ($products->take(10) as $index => $product)
        <div class="product-item" wire:key='{{$index}}'>
            <div class="pi-pic">
                @foreach ($product->photos->take(1) as $photo)
                <img src="{{Storage::url($photo->photo)}}" alt="">
                @endforeach
                <div class="sale">Sale</div>
                <div class="icon">
                    <i class="icon_heart_alt"></i>
                </div>
                <ul>
                    <li class="w-icon active">
                        <a href="#" wire:click.prevent="$dispatch('addToCart', { slug: '{{ $product->slug }}' })">
                            <i class="icon_bag_alt"></i>
                        </a>
                    </li>

                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                </ul>
            </div>
            <div class="pi-text">
                <div class="catagory-name">{{$key}}</div>
                <a href="#">
                    <h5>{{$product->title }}</h5>
                </a>
                <div class="product-price">
                    ${{$product->price}}
                    <span>$35.00</span>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>