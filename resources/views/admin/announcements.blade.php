@extends('admin.layouts.master')
@section('announces-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Announcements</h5>
        </div>
        <div class="card-body">
            @livewire('admin.announcements.announcements-data')
        </div>
    </div>

    <!-- / Content -->
@endsection
