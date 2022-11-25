@extends('layouts.auth')
@section('content')

<div class="bg-image"
    style="background-image: url('static/background_sismil.jpg'); background-repeat: no-repeat;background-attachment: fixed;background-position: center; height: 100vh">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.png" height="80" alt="SISMIL"></a>
            </div>
            <div>

                @if (Session::get('error'))
                <div class="alert alert-warning">
                    {!! Session::get('error') !!}
                </div>
                @endif

                @if (Session::get('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
                @endif

                <form class="card card-md" action="{{ route('register') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __("Registre-se") }}</h2>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nome') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" maxlength="45" placeholder="Nome Completo" autofocus autocomplete="off">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('CPF') }}</label>
                            <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror"  name="cpf" value="{{ old('cpf') }}" maxlength="11" placeholder="CPF" autocomplete="off">
                            @error('cpf')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" maxlength="45" placeholder="Email" autocomplete="off">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label"> {{ __('Senha') }} </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Senha" autocomplete="off">
                            </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label"> {{ __('Confirmar Senha') }} </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmar Senha" autocomplete="off">
                            </div>
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">{{ __("Cadastrar") }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-center text-muted mt-3">
                Já tem cadastro? <a href="{{route('login')}}" tabindex="-1">Entre</a>
            </div>
        </div>
    </div>
</div>

@endsection