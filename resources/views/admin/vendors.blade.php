@extends('admin.layouts.master')
@section('vendors-active', 'active')
@section('content')
<!-- Content -->
<div class="card">
    <div class="mt-5">
        <h5 class="card-header d-inline">Vendors Table</h5>
    </div>
    <div class="card-body">
        @livewire('admin.vendors.vendors-data')
    </div>
    {{-- @livewire('admin.vendors.vendors-delete') --}}
</div>
<!-- / Content -->
@endsection