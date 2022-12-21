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

                @if (Session::get('resent'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ __('Um novo link de verificação foi enviado para seu endereço de email.') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="card card-md" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __('Verifique seu Endereço de Email') }}</h2>
                        <div class="mb-2">
                            {{ __('Antes de continuar, verifique seu e-mail para obter um link de verificação.') }}
                            <br>
                            {{ __('Caso não tenha recebido, solicite novamente.') }}
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Solicitar Novamente') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center text-muted mt-3">
                Voltar para a tela de <a href="{{route('login')}}" tabindex="-1">Login</a>
                ou
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </div>
    </div>
</div>

@endsection
