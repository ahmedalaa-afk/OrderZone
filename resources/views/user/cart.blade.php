@extends('user.layouts.master')
@section('title', 'Cart')
@section('active-wishlist', 'active')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('user.index') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Cart Section Begin -->
<section class="cart spad">
    <div class="container">
        <!-- Session Status -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(count($products) > 0)
        <div class="row">
            <!-- Cart Products -->
            <div class="col-lg-8">
                <div class="cart-table">
                    @foreach ($products as $product)
                    <div class="cart-item d-flex align-items-center mb-4 p-3 shadow-sm">
                        <!-- Product Image -->
                        <div class="cart-item-img">
                            <img src="{{ Storage::url($product->photos->first()->photo) }}" alt="{{ $product->name }}"
                                class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        <!-- Product Info -->
                        <div class="cart-item-info ms-4 flex-grow-1">
                            <h6>{{ $product->name }}</h6>
                            <small class="text-muted">{{ $product->category->name ?? '' }}</small>
                            <div class="price mt-2">
                                ${{ $product->price }}
                            </div>
                        </div>
                        <!-- Quantity Controls -->
                        <div class="cart-item-quantity d-flex align-items-center">
                            <form action="{{ route('user.cart.remove', $product->slug) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" name="action" value="decrement"
                                    class="btn btn-outline-danger btn-sm">-</button>
                            </form>
                            <span class="mx-3">{{ $product->pivot->quantity }}</span>
                            <form action="{{ route('user.cart.add', $product->slug) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" name="action" value="increment"
                                    class="btn btn-outline-success btn-sm">+</button>
                            </form>
                        </div>
                        <!-- Total Price -->
                        <div class="cart-item-total ms-4">
                            ${{ $product->pivot->quantity * $product->price }}
                        </div>
                        <!-- Remove Button -->
                        <div class="cart-item-remove ms-4">
                            <form action="{{ route('user.cart.remove', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="cart-summary shadow-sm p-4 rounded">
                    <h5 class="mb-4">Cart Summary</h5>
                    <ul class="list-group mb-4">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>${{ $products->sum(fn($product) => $product->pivot->quantity * $product->price)
                                }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <span>${{ $products->sum(fn($product) => $product->pivot->quantity * $product->price)
                                }}</span>
                        </li>
                    </ul>
                    <a href="{{ route('user.checkout.index') }}" class="btn btn-primary btn-block">Proceed to
                        Checkout</a>
                    <a href="{{ route('user.shop') }}" class="btn btn-secondary btn-block mt-2">Continue Shopping</a>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <h4 class="text-danger">Your cart is empty.</h4>
            <a href="{{ route('user.shop') }}" class="btn btn-secondary mt-3">Continue Shopping</a>
        </div>
        @endif
    </div>
</section>
<!-- Cart Section End -->

@endsection