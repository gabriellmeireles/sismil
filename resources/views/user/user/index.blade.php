@extends('layouts.pages')
@section('page-title', 'Dashboad - '. config('app.name'))
@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Bem vindo ao Sistema de Militares Temporários.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @livewire('user.user.profile-header')

    <hr>
    <div class="row">
        @livewire('user.user.dashboard-contest')
    </div>
@endsection
