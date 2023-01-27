@extends('layouts.pages')
@section('page-title', 'Incrição - '. config('app.name'))
@section('content')

    <div class="row">
        @livewire('user.form.form')
    </div>
@endsection
