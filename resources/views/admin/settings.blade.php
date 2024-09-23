@extends('admin.layouts.master')
@section('settings-active', 'active')
@section('content')
    <!-- Content -->

    <div class="col-xl-6">
        <!-- HTML5 Inputs -->
        <div class="card mb-4">
            <h5 class="card-header">Application Settings</h5>
            @livewire('admin.settings.settings-data')
        </div>
    </div>
    <!-- / Content -->
@endsection
