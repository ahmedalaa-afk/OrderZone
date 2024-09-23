@extends('admin.layouts.master')
@section('users-active', 'active')
@section('content')
<!-- Content -->
<div class="card">
    <div class="mt-5">
        <h5 class="card-header d-inline">Users Table</h5>
        <!-- Default Modal -->
        <!-- Button trigger modal -->

        @role('user_manager','admin')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Add User
        </button>
        @endrole
    </div>
    <div class="mt-1">
        @livewire('admin.users.users-create')


    </div>
    <div class="card-body">
        @livewire('admin.users.users-data')
    </div>
    @livewire('admin.users.users-delete')
</div>
<!-- / Content -->
@endsection