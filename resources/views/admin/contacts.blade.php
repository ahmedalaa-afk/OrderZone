@extends('admin.layouts.master')
@section('user-contacts-active', 'active')
@section('content')
    <!-- Content -->
    <div class="card">
        <div class="mt-5">
            <h5 class="card-header d-inline">Contacts</h5>
        </div>
        <div class="card-body">
            @livewire('admin.contacts.contacts-data')
        </div>
    </div>

    <!-- / Content -->
@endsection
