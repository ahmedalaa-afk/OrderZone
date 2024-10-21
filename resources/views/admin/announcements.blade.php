@extends('admin.layouts.master')
@section('announces-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Announcements</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                Add Announcement
            </button>
        </div>
        <div class="card-body">
            @livewire('admin.announcements.announcements-data')
        </div>
        @livewire('admin.announcements.announcements-create')
    </div>

    <!-- / Content -->
@endsection
