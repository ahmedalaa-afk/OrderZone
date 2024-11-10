@extends('admin.layouts.master')
@section('tags-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Tags</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTagModal">
                Add Tag
            </button>
        </div>
        <div class="card-body">
            @livewire('admin.tags.tags-data')
        </div>
        @livewire('admin.tags.tags-create')
    </div>

    <!-- / Content -->
@endsection
