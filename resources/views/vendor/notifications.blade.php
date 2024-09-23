@extends('vendor.layouts.master')
@section('notifications-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Notificaions</h5>
        </div>
        <div class="card-body">
            @livewire('vendor.notifications.notifications-data')
        </div>
    </div>
    <!-- / Content -->
@endsection
