<div>
    <form method="post" wire:submit.prevent='updateProfile()'>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name"
                        placeholder="Nome completo do militar" wire:model='name'>
                    <span class="invalid-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email do militar" disabled
                        wire:model='email'>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" placeholder="CPF do militar" disabled
                        wire:model='cpf'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Posto/Graduação</label>
                    <select class="form-select" name="rank_degree" wire:model='rank_degree'>
                        @foreach ($rankDegrees as $item)
                            <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label class="form-label">Nome de Guerra</label>
                    <input type="text" class="form-control @error('war_name'){{ 'is-invalid' }}@enderror"
                        name="war_name" placeholder="Nome de guerra do militar" wire:model='war_name'>
                    <span class="invalid-feedback">
                        @error('war_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Arma/Quadro/Serviço</label>
                    <select class="form-select" name="combat_arm" wire:model='combat_arm'>
                        @foreach ($combatArms as $item)
                            <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Seção</label>
                    <select class="form-select" name="section" wire:model='section'>
                        @foreach ($sections as $item)
                            <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Função</label>
                    <select class="form-select" name="user_type" wire:model='user_type'>
                        @foreach ($userTypes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Usuário Status</label>
                    <select class="form-select" name="status" wire:model='status'>
                        <option value="1">Inativo</option>
                        <option value="0">Ativo</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-success" style="width: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                    Salvar Alterações
                </button>
            </div>
        </div>
    </form>

</div>
