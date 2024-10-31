@extends('admin.layouts.master')
@section('departments-active', 'active')
@section('content')
<!-- Content -->
<div class="card">
    <div class="mt-5">
        <h5 class="card-header d-inline">Departments Table</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDepartmentModal">
            New Department
        </button>
    </div>
    <div class="card-body">
        @livewire('admin.departments.departments-data')
    </div>
    @livewire('admin.departments.departments-create')
    {{-- @livewire('admin.categories.categories-delete') --}}
</div>
<!-- / Content -->
@endsection