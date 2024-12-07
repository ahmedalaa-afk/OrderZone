@extends('user.layouts.master')
@section('title','Orders')
@section('active-orders','active')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Orders Section Begin -->
<section class="orders-section py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <form method="GET" action="{{ route('user.order.filter') }}">
                    <div class="d-flex align-items-center">
                        <label for="filter" class="me-2 fw-bold">Filter by Status:</label>
                        <select name="status" id="filter" class="form-select w-auto">
                            <option value="all" {{ request('status') == '' ? 'selected' : '' }}>All</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-primary ms-3">Apply</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
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

                @if ($orders->count() > 0)
                <div class="row">
                    @foreach ($orders as $order)
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Order #{{$order->id}}</h5>
                                <span class="badge 
                                    @if ($order->status == 'paid') bg-success
                                    @elseif ($order->status == 'pending') bg-warning
                                    @else bg-danger @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <div class="card-body">
                                <p class="mb-2"><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                                <p class="mb-2"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                                <p class="mb-2"><strong>Products:</strong></p>
                                <ul class="list-group list-group-flush mb-3">
                                    @foreach ($order->products as $product)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>{{$product->name}} (x{{$product->pivot->quantity}})</span>
                                        <span>${{ number_format($product->pivot->price, 2) }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="d-flex justify-content-between">
                                    @if ($order->status != 'cancelled')
                                    <a href="{{route('user.order.proccess.payment', ['id' => $order->id])}}" class="btn btn-primary btn-sm">
                                        Proccess Payment
                                    </a>
                                    <form action="{{route('user.order.cancel', ['id' => $order->id])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Cancel Order</button>
                                     </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{$orders->appends(request()->query())->links()}}
                </div>
                @else
                <div class="text-center">
                    <h4 class="text-danger">No orders found.</h4>
                    <a href="{{route('user.shop')}}" class="btn btn-primary">Shop Now</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Orders Section End -->

@endsection
