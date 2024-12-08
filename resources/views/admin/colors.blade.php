@extends('admin.layouts.master')
@section('colors-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Colors</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createColorModal">
                Add Color
            </button>
        </div>
        <div class="card-body">
            @livewire('admin.colors.colors-data')
        </div>
        @livewire('admin.colors.colors-create')
        @livewire('admin.colors.colors-delete')
    </div>

    <!-- / Content -->
@endsection
