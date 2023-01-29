@extends('layouts.pages')
@section('page-title', 'Incrição - '. config('app.name'))
@section('content')
    <div class="row">
        @livewire('user.form.form', ['contest_notice_id' => $contest_notice_id])
    </div>
@endsection
