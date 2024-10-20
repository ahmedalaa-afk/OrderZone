@extends('admin.layouts.master')
@section('home-active', 'active')
@section('content')
<!-- Content -->

@role('vendor_manager','admin')
@livewire('admin.vendors.vendors-registration-date')
@endrole
<!-- / Content -->
@endsection