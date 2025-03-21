@extends('user.layouts.master')
@section('title','Shop')
@section('active-shop','active')
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('user.index')}}"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('user.getCategoryProducts', ['category' => $category->name ?? 'all']) }}">
                                {{ str_replace('-', ' ', $category->name) }}
                            </a>
                        </li>

                        @endforeach
                    </ul>
                </div>
                <form action="{{ route('user.filterProducts') }}" method="POST">
                    @csrf
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            @foreach ($brands as $brand)
                            <div class="bc-item">
                                <label for="bc-{{$brand->name}}">
                                    {{$brand->name}}
                                    <input type="checkbox" name="brands[]" value="{{$brand->name}}"
                                        id="bc-{{$brand->name}}" @if(isset($selectedBrandNames) &&
                                        in_array($brand->name, $selectedBrandNames)) checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount" name="minamount">
                                    <input type="text" id="maxamount" name="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="{{$minamount??0}}" data-max="{{$maxamount??1000}}">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <button type="submit" class="btn filter-btn">Filter</button>
                        <a href="{{route('user.shop')}}" class="btn filter-btn">Reset</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            @foreach ($colors as $color)
                            <div class="cs-item">
                                <input type="radio" id="cs-{{$color->name}}" name="color" value="{{ $color->name }}">
                                <label class="cs-{{$color->name}}" for="cs-{{$color->name}}">{{ $color->name
                                    }}</label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            @foreach ($sizes as $size)
                            <div class="sc-item">
                                <input type="radio" id="{{$size->name}}-size" name="size" value="{{$size->name}}">
                                <label for="{{$size->name}}-size">{{$size->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            @foreach ($tags as $tag)
                            <a href="{{route('user.getTagProducts',['tag'=>$tag->name])}}">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
            </div>
            </form>
            <div class="col-lg-9 order-1 order-lg-2">
                @if (count($products) > 0)
                <div class="product-list">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{Storage::url($product->photos->first()->photo)}}" alt="">
                                    <div class="sale pp-sale">Sale</div>
                                    <a href="{{route('user.wishlist.add',['product_id' => $product->id])}}">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                    </a>
                                    <ul>
                                        <li class="w-icon active">
                                            <a href="#"
                                                wire:click.prevent="$dispatch('addToCart', { slug: '{{ $product->slug }}' })">
                                                <i class="icon_bag_alt"></i>
                                            </a>
                                        </li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon">
                                            <a href="{{route('user.wishlist.remove',['product_id' => $product->id])}}">
                                                <i class="fa fa-random">
                                                </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{str_replace('-','
                                        ',$product->category->name)}}</div>
                                    <a href="#">
                                        <h5>{{$product->name}}</h5>
                                    </a>
                                    @if (isset($product->discount) &&
                                    $product->discount->end_at > now())
                                    <div class="product-price">
                                        ${{$product->total}}
                                        <span>${{$product->price}}</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        ${{$product->total}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="loading-more">
                    <i class="icon_loading"></i>
                    <a href="#">
                        Loading More
                    </a>
                </div>
                @else
                <div class="">
                    <span class="text-danger">no item found.</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
@endsection