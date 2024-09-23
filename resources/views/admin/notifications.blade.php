@extends('admin.layouts.master')
@section('notifications-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Notificaions</h5>
        </div>
        <div class="card-body">
            @livewire('admin.notifications.notification-data')
        </div>
    </div>
    @livewire('admin.notifications.notifications-show')
    {{-- @livewire('admin.notifications.accept-vendor') --}}

    <!-- / Content -->
@endsection
