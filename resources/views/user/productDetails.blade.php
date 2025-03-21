@extends('user.layouts.master')
@section('title', 'Product Details')
@section('active-productDetails', 'active')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
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
                <div class="filter-widget">
                    <h4 class="fw-title">Brand</h4>
                    <div class="fw-brand-check">
                        @foreach ($brands as $brand)
                        <div class="bc-item">
                            <label for="bc-{{$brand->name}}">
                                {{$brand->name}}
                                <input type="checkbox" name="brands[]" value="{{$brand->name}}" id="bc-{{$brand->name}}"
                                    @if(isset($selectedBrandNames) && in_array($brand->name, $selectedBrandNames))
                                checked @endif>
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
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            @foreach ($product->photos as $photo)
                            <div class="pt active" data-imgbigurl=" {{Storage::url($photo->photo)}}"><img
                                    src="{{Storage::url($photo->photo)}}" alt=""></div>
                            @endforeach
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                    {{-- Product Section --}}
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{$product->tag->name}}</span>
                                <h3>{{$product->title}}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div>
                            <div class="pd-desc">
                                <p>{{$product->description}}</p>
                                <h4>@if (isset($product->discount) &&
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
                                </h4>
                            </div>
                            <div class="quantity">
                                <form action="{{route('user.cart.add',['slug' => $product->slug])}}" method="POST">
                                    @csrf

                                    <button class="primary-btn pd-cart">Add To Cart</button>
                                </form>
                            </div>
                            <ul class="pd-tags">
                                <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases</li>
                                <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">Sku : 00012</div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h5>Introduction</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                                            <h5>Features</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Customer Rating</td>
                                            <td>
                                                <div class="pd-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Price</td>
                                            <td>
                                                <div class="p-price">$495.00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Add To Cart</td>
                                            <td>
                                                <div class="cart-add">+ add to cart</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Availability</td>
                                            <td>
                                                <div class="p-stock">22 in stock</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Weight</td>
                                            <td>
                                                <div class="p-weight">1,3kg</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Size</td>
                                            <td>
                                                <div class="p-size">Xxl</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Color</td>
                                            <td><span class="cs-color"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Sku</td>
                                            <td>
                                                <div class="p-code">00012</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>2 Comments</h4>
                                    <div class="comment-option">
                                        <div class="co-item">
                                            <div class="avatar-pic">
                                                <img src="img/product-single/avatar-1.png" alt="">
                                            </div>
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">Nice !</div>
                                            </div>
                                        </div>
                                        <div class="co-item">
                                            <div class="avatar-pic">
                                                <img src="img/product-single/avatar-2.png" alt="">
                                            </div>
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">Nice !</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="personal-rating">
                                        <h6>Your Ratind</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="leave-comment">
                                        <h4>Leave A Comment</h4>
                                        <form action="#" class="comment-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12">
                                                    <textarea placeholder="Messages"></textarea>
                                                    <button type="submit" class="site-btn">Send message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-9 order-1 order-lg-2">
            @if (count($relatedProducts) > 0)
            <div class="product-list">
                <div class="row">
                    @foreach ($relatedProducts as $product)
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
                                        <form action="{{route('user.cart.add',['slug' => $product->slug])}}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="p-2" style="background-color: #DBB624">
                                                <i class="icon_bag_alt"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <li class="quick-view"><a href="{{route('user.show',['product'=>$product])}}">+
                                            Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
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
<!-- Related Products Section End -->

@endsection