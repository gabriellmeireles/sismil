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

                <form class="card card-md" action="{{ route('login') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Acesse sua Conta</h2>
                        <div class="mb-3">
                            <label class="form-label">{{ __('CPF') }}</label>
                            <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror"  name="cpf" value="{{ old('cpf') }}" maxlength="11" placeholder="CPF">
                            @error('cpf')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label"> {{ __('Senha') }} </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="off">
                            </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <span class="form-label-description">
                                <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
                            </span>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-center text-muted mt-3">
                Ainda não tem conta? <a href="{{route('register')}}" tabindex="-1">Cadastre-se</a>
            </div>
        </div>
    </div>
</div>

@endsection