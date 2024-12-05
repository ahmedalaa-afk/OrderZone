@extends('admin.layouts.master')
@section('categories-active', 'active')
@section('content')
<!-- Content -->
<div class="card">
    <div class="mt-5">
        <h5 class="card-header d-inline">Categories Table</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            New Category
        </button>

    </div>
    <div class="card-body">
        @livewire('admin.categories.categories-data')
    </div>
    @livewire('admin.categories.categories-create')
    @livewire('admin.categories.categories-delete')
</div>
<!-- / Content -->
@endsection