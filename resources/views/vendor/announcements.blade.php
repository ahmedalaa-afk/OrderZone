@extends('vendor.layouts.master')
@section('announcement-active', 'active')
@section('content')
    <!-- Content -->

    <div class="col-xl-6">
        <!-- HTML5 Inputs -->
        <div class="card mb-4">
            <h5 class="card-header">Dashboard</h5>
            <div class="card-body">
                @livewire('vendor.announcements.announcements-data')
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
