@extends('admin.layouts.master')
@section('products-active', 'active')
@section('content')
<!-- Content -->
<div class="card">
    <div class="mt-5">
        <h5 class="card-header d-inline">Products Table</h5>
    </div>
    <div class="card-body">
        @livewire('admin.products.products-data')
    </div>
    @livewire('admin.products.products-details')
</div>
<!-- / Content -->
@endsection