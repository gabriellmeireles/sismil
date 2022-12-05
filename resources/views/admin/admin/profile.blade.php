@extends('layouts.pages')
@section('page-title', 'Perfil - '. config('app.name'))
@section('content')

@livewire('admin.profile.profile-header')

<hr>
<div class="row">

  <div class="card">
    <ul class="nav nav-tabs" data-bs-toggle="tabs">
      <li class="nav-item">
        <a href="#tabs-details" class="nav-link active" data-bs-toggle="tab">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <circle cx="12" cy="7" r="4" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
          </svg>
          Detalhes Pessoal
        </a>
      </li>
      <li class="nav-item">
        <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
          </svg>
          Alterar Senha
        </a>
      </li>
    </ul>
    <div class="card-body">
      <div class="tab-content">
        {{-- INICIO ABA DE DADOS PESSOAIS --}}
        <div class="tab-pane active show" id="tabs-details">
          <div class="mt-2">
            @livewire('admin.profile.profile')
          </div>
        </div>
        {{-- INICIO ABA MUDAR SENHA --}}
        <div class="tab-pane" id="tabs-password">
          <div class="mt-2">
            @livewire('admin.profile.change-password')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
