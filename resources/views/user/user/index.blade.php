@extends('layouts.pages')
@section('page-title', 'Dashboad - '. config('app.name'))
@section('content')

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @livewire('user.user.profile-header')

    <div class="hr-text">
        <span>Editais Abertos</span>
    </div>
    <div class="row">
        @livewire('user.form.contest-opened')
    </div>

    <div class="hr-text">
        <span>Suas Inscrições</span>
    </div>
    <div class="row">
        @livewire('user.user.dashboard')
    </div>
@endsection
