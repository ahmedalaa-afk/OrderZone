@extends('user.layouts.master')

@section('title', 'Page Not Found')
@section('active-fallback', 'active')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center text-center py-5" style="min-height: 80vh;">
    <h1 class="display-1 text-danger fw-bold">404</h1>
    <h2 class="mb-3">Oops! Page Not Found</h2>
    <p class="text-muted">
        The page you’re looking for might have been moved, deleted, or does not exist. 
        Please check the URL or return to the homepage.
    </p>
    <div class="mt-4">
        <a href="{{ route('user.index') }}" class="btn btn-primary btn-lg me-3">Back to Home</a>
        <a href="{{ route('user.contact') }}" class="btn btn-outline-secondary btn-lg">Contact Support</a>
    </div>
</div>
@endsection
