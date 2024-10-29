@extends('user.layouts.master')
@section('title','Home')
@section('active-home','active')
@section('content')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="{{asset('img')}}/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="{{asset('img')}}/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{asset('img')}}/banner-1.jpg" alt="">
                    <div class="inner-text">
                        <h4>Men’s</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{asset('img')}}/banner-2.jpg" alt="">
                    <div class="inner-text">
                        <h4>Women’s</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="{{asset('img')}}/banner-3.jpg" alt="">
                    <div class="inner-text">
                        <h4>Kid’s</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                    <h2>Women’s</h2>
                    <a href="#">Discover More</a>
                </div>
            </div>
            @livewire('user.products.women-products')
        </div>
    </div>
</section>
<!-- Women Banner Section End -->




<!-- Deal Of The Week Section Begin-->
@if ($product && isset($product->discounts) && $product->discounts->end_at > now())
<section class="deal-of-week set-bg spad" data-setbg="{{Storage::url($product->photos[0]->photo)}}">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Deal Of The Week</h2>
                <p>{{$product->description}}</p>
                <div class="product-price">
                    ${{$product->total}}
                    <span>/ {{str_replace('-',' ',$product->getCategoryName())}}</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>{{$product->discounts->start_at}}</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Secs</p>
                </div>
            </div>
            <a href="#" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section>
@endif
<!-- Deal Of The Week Section End -->

<!-- Man Banner Section Begin -->
<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            @livewire('user.products.men-products')
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg m-large" data-setbg="{{asset('img')}}/products/man-large.jpg">
                    <h2>Men’s</h2>
                    <a href="#">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Man Banner Section End -->

<!-- Instagram Section Begin -->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="{{asset('img')}}/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('img')}}/insta-2.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('img')}}/insta-3.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('img')}}/insta-4.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('img')}}/insta-5.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="{{asset('img')}}/insta-6.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
        </div>
    </div>
</div>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{asset('img')}}/latest-1.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 4,2019
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                5
                            </div>
                        </div>
                        <a href="#">
                            <h4>The Best Street Style From London Fashion Week</h4>
                        </a>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{asset('img')}}/latest-2.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 4,2019
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                5
                            </div>
                        </div>
                        <a href="#">
                            <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                        </a>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="{{asset('img')}}/latest-3.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 4,2019
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                5
                            </div>
                        </div>
                        <a href="#">
                            <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                        </a>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->
<div class="benefit-items">
    <div class="row">
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{asset('img')}}/icon-1.png" alt="">
                </div>
                <div class="sb-text">
                    <h6>Free Shipping</h6>
                    <p>For all order over 99$</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{asset('img')}}/icon-2.png" alt="">
                </div>
                <div class="sb-text">
                    <h6>Delivery On Time</h6>
                    <p>If good have prolems</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{asset('img')}}/icon-1.png" alt="">
                </div>
                <div class="sb-text">
                    <h6>Secure Payment</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection