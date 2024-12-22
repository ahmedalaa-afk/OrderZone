@extends('vendor.layouts.master')
@section('title','Profile Page')
@section('content')
@livewire('vendor.profile.partials.profile-information')
@livewire('vendor.profile.partials.update-password')
@endsection