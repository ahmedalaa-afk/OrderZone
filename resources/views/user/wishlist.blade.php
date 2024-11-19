@extends('user.layouts.master')
@section('title','WishList')
@section('active-wishlist','active')
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('user.index')}}"><i class="fa fa-home"></i> Home</a>
                    <span>WishList</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->

<!-- Session Status -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<section class="product-shop spad">
    <div class="container">
        <div class="row">
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
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class='bx bx-folder-minus'></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{str_replace('-','
                                        ',$product->categories->first()->name)}}</div>
                                    <a href="#">
                                        <h5>{{$product->name}}</h5>
                                    </a>
                                    @if (isset($product->discounts) && $product->discounts->type == 'product' &&
                                    $product->discounts->end_at > now())
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