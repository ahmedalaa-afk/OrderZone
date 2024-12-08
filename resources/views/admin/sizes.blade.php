@extends('admin.layouts.master')
@section('sizes-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Sizes</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSizeModal">
                Add Size
            </button>
        </div>
        <div class="card-body">
            @livewire('admin.sizes.sizes-data')
        </div>
        @livewire('admin.sizes.sizes-create')
        @livewire('admin.sizes.sizes-delete')
    </div>

    <!-- / Content -->
@endsection
