@extends('layouts.pages')
@section('page-title', 'Dashboard - '. config('app.name'))

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>admin page</h1>
@endsection
