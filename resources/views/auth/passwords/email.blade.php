@extends('layouts.auth')
@section('content')

<div class="bg-image" style="background-image: url('static/background_sismil.jpg'); background-repeat: no-repeat;background-attachment: fixed;background-position: center; height: 100vh">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.png" height="80" alt="SISMIL"></a>
            </div>
            <div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (Session::get('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
                @endif

                <form class="card card-md" action="{{ route('password.email') }}" method="post" autocomplete="off">
                    @csrf

                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __('Esqueceu a senha?') }}</h2>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off"
                                autofocus>
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Enviar Link de Redefinição de
                                Senha</button>
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