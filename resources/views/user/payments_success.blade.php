@extends('user.layouts.master')
@section('title','Payment Success')
@section('active-payment-success','active')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{route('user.index')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{route('user.shop')}}">Shop</a>
                    <span>Payment Success</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Payment Success Section Begin -->
<div class="payment-success-section spad">
    <div class="container text-center">
        <div class="success-icon">
            <i class="fa fa-check-circle" style="font-size: 100px; color: green;"></i>
        </div>
        <h2 class="mt-4">Payment Successful!</h2>
        <p class="mt-3">Thank you for your purchase. Your order has been successfully placed and is being processed.</p>
        <a href="#" class="primary-btn mt-4">View My Orders</a>
        <a href="{{route('user.shop')}}" class="primary-btn mt-2">Continue Shopping</a>
    </div>
</div>
<!-- Payment Success Section End -->

@endsection
