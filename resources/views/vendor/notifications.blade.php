@extends('vendor.layouts.master')
@section('notifications-active', 'active')
@section('content')
<!-- Content -->
<div class="card mb-4">
    <h5 class="card-header">Notifications</h5>
    <div class="card-body">
        @livewire('vendor.notifications.notifications-data')
    </div>
</div>
<!-- / Content -->
@endsection