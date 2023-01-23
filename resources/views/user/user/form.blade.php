@extends('layouts.pages')
@section('page-title', 'Incrição - '. config('app.name'))
@section('content')

    <div class="row">
        @livewire('user.user.form')
    </div>
@endsection
