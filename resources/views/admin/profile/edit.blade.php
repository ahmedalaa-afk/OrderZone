@extends('admin.layouts.master')
@section('title','Profile Page')
@section('content')
@livewire('admin.profile.partials.profile-information')
@livewire('admin.profile.partials.update-password')
@livewire('admin.profile.partials.delete-account')
@endsection