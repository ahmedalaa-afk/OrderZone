@extends('admin.layouts.master')
@section('brands-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Brands</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBrandModal">
                Add Brand
            </button>
        </div>
        <div class="card-body">
            @livewire('admin.brands.brands-data')
        </div>
        @livewire('admin.brands.brands-create')
        @livewire('admin.brands.brands-update')
        @livewire('admin.brands.brands-Delete')
    </div>

    <!-- / Content -->
@endsection
