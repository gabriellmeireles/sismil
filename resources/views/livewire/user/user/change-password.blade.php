<div>
    <form method="post" wire:submit.prevent='updatePassword()'>
        <div class="row">
            <div class="col md-6">
                <div class="mb-3">
                    <label class="form-label">Senha Atual</label>
                    <input type="password" class="form-control @error('current_password'){{ 'is-invalid' }}@enderror"
                        name="current_password" placeholder="Digite a Senha Atual" wire:model='current_password'>
                    <span class="invalid-feedback">
                        @error('current_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col md-6">
                <div class="mb-3">
                    <label class="form-label">Nova Senha</label>
                    <input type="password" class="form-control @error('new_password'){{ 'is-invalid' }}@enderror"
                        name="new_password" placeholder="Digite a Nova Senha" wire:model='new_password'>
                    <span class="invalid-feedback">
                        @error('new_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Confirmar Nova Senha</label>
                    <input type="password"
                        class="form-control @error('confirm_new_password'){{ 'is-invalid' }}@enderror"
                        name="confirm_new_password" placeholder="Repita a Nova Senha" wire:model='confirm_new_password'>
                    <span class="invalid-feedback">
                        @error('confirm_new_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-success" style="width: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                    Alterar Senha
                </button>
            </div>
        </div>
    </form>
</div>
