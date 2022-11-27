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

                <form class="card card-md" action="{{ route('password.update') }}" method="post" autocomplete="off">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __('Redefinir Senha') }}</h2>
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" value="{{ old('password') }}" placeholder="Nova Senha" autocomplete="off">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label"> {{ __('Confirmar Senha') }} </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmar Senha" autocomplete="off">
                            </div>
                            @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Redefinir Senha</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center text-muted mt-3">
                Voltar para a tela de <a href="{{route('login')}}" tabindex="-1">Login</a>
            </div>
        </div>
    </div>
</div>

@endsection