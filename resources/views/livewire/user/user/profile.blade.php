<div>
    <form method="post" wire:submit.prevent='updateProfile()'>
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Tipo de Candidato</label>
                    <select name="candidate_type_id" id="candidate_type_id" class="form-control" wire:model='candidate_type_id'>
                        <option>---</option>
                        @forelse ( $candidateTypes as $candidateType)
                            <option value="{{ $candidateType->id }}">{{ $candidateType->name }}</option>
                        @empty
                            Tipos de Usuário não cadastrados.
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" wire:model='name' name="name" placeholder="Nome completo do candidato">
                    <span class="invalid-feedback"> @error('name') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control @error('birth_date'){{ 'is-invalid' }}@enderror" wire:model='birth_date' name="birth_date" placeholder="Data de Nascimento">
                    <span class="invalid-feedback"> @error('birth_date') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Sexo</label>
                    <select name="gender" class="form-control @error('gender'){{ 'is-invalid' }}@enderror" wire:model='gender' name="gender">
                        <option selected>---</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    <span class="invalid-feedback"> @error('name') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Estado Civil</label>
                    <select name="marital_status" class="form-control @error('marital_status'){{ 'is-invalid' }}@enderror" wire:model='marital_status' name="marital_status">
                        <option selected>---</option>
                        <option value="1">Solteiro</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Separado</option>
                        <option value="5">Viúvo</option>
                        <option value="6">União Estável</option>
                    </select>
                    <span class="invalid-feedback"> @error('marital_status') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Nº de Dependentes</label>
                    <input type="number" class="form-control @error('dependent_number'){{ 'is-invalid' }}@enderror" min="0" wire:model='dependent_number' name="dependent_number" placeholder="Nº de Dependentes">
                    <span class="invalid-feedback"> @error('dependent_number') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Altura</label>
                    <input type="text" class="form-control @error('height'){{ 'is-invalid' }}@enderror" wire:model='height'>
                    <span class="invalid-feedback">@error('height') {{ $message }} @enderror</span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Peso</label>
                    <input type="text" class="form-control @error('weight'){{ 'is-invalid' }}@enderror" wire:model='weight'>
                    <span class="invalid-feedback">@error('weight') {{ $message }} @enderror</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">CPF</label>
                    <input type="text" class="form-control @error('cpf'){{ 'is-invalid' }}@enderror" wire:model='cpf' name="cpf" placeholder="CPF do candidato" disabled>
                    <span class="invalid-feedback"> @error('cpf') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Identidade</label>
                    <input type="text" class="form-control @error('identity'){{ 'is-invalid' }}@enderror" wire:model='identity' name="identity" placeholder="Número da identidade">
                    <span class="invalid-feedback"> @error('identity') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="Órgão Expedido" class="form-label">Órgão Expedidor</label>
                    <input type="text" class="form-control @error('issuing_agency'){{ 'is-invalid' }}@enderror" wire:model='issuing_agency' name="issuing_agency">
                    <span class="invalid-feedback"> @error('issuing_agency') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nome da Mãe</label>
                    <input type="text" class="form-control @error('mother_name'){{ 'is-invalid' }}@enderror" wire:model='mother_name' name="mother_name" placeholder="Nome da Mãe">
                    <span class="invalid-feedback"> @error('mother_name') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nome do Pai</label>
                    <input type="text" class="form-control @error('father_name'){{ 'is-invalid' }}@enderror" wire:model='father_name' name="father_name" placeholder="Nome do Pai">
                    <span class="invalid-feedback"> @error('father_name') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Naturalidade</label>
                    <input type="text" class="form-control @error('naturalness'){{ 'is-invalid' }}@enderror" wire:model='naturalness' name="naturalness" placeholder="Estado de Nascimento">
                    <span class="invalid-feedback"> @error('naturalness') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nacionalidade</label>
                    <input type="text" class="form-control @error('nationality'){{ 'is-invalid' }}@enderror" wire:model='nationality' name="nationality" placeholder="País de Nascimento">
                    <span class="invalid-feedback"> @error('nationality') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">CEP</label>
                    <input type="number" class="form-control @error('zip_code'){{ 'is-invalid' }}@enderror" wire:model='zip_code' name=zip_code>
                    <span class="invalid-feedback"> @error('zip_code') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label class="form-label">Endereço</label>
                    <input type="text" class="form-control @error('address'){{ 'is-invalid' }}@enderror" wire:model='address' name=address>
                    <span class="invalid-feedback"> @error('address') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Bairro</label>
                    <input type="text" class="form-control @error('district'){{ 'is-invalid' }}@enderror" wire:model='district' name=district>
                    <span class="invalid-feedback"> @error('district') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Cidade</label>
                    <input type="text" class="form-control @error('city'){{ 'is-invalid' }}@enderror" wire:model='city' name=city>
                    <span class="invalid-feedback"> @error('city') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-1">
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <input type="text" class="form-control @error('state'){{ 'is-invalid' }}@enderror" maxlength="2" wire:model='state' name=state>
                    <span class="invalid-feedback"> @error('state') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email'){{ 'is-invalid' }}@enderror" wire:model='email' name="email" placeholder="Email do candidato" disabled>
                    <span class="invalid-feedback"> @error('email') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <div class="mb-3">
                    <label class="form-label">DDD</label>
                    <input type="text" class="form-control @error('ddd'){{ 'is-invalid' }}@enderror" wire:model='ddd' name="ddd" maxlength="2" minlength="2" placeholder="Ex: 55">
                    <span class="invalid-feedback"> @error('ddd') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" class="form-control @error('number'){{ 'is-invalid' }}@enderror" wire:model='number' name="number" maxlength="9" minlength="8" placeholder="Ex: 55555-5555">
                    <span class="invalid-feedback"> @error('number') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="offset-md-9 col-md-3">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-success" style="width: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                    Salvar
                </button>
            </div>
        </div>
    </form>

</div>
