@extends('vendor.layouts.master')
@section('product-active', 'active')
@section('content')
<!-- Content -->

<div class="card">
    <div class="mt-5">
        <h5 class="card-header d-inline">Products</h5>
        @role('vendor','vendor')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            New Product
        </button>
        @endrole
    </div>
    <div class="card-body">
        @livewire('vendor.products.products-data')
    </div>
    @livewire('vendor.products.products-create')
    @livewire('vendor.products.products-edit')
    @livewire('vendor.products.discounts-create')
</div>
<!-- / Content -->
@endsection