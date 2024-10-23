@extends('vendor.layouts.master')
@section('announcements-active', 'active')
@section('content')
<!-- Content -->
<div class="card mb-4">
    <h5 class="card-header">Announcements</h5>
    <div class="card-body">
        @livewire('vendor.announcements.announcements-data')
    </div>
</div>
<!-- / Content -->
@endsection