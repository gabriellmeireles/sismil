@extends('layouts.pages')
@section('page-title', 'Editais Abertos - '. config('app.name'))
@section('content')

    <div class="row">
        @livewire('user.form.form')
    </div>
@endsection
