<div>
    <form method="post" wire:submit.prevent='storeForm()'>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Área</label>
                    <select name="contest_area_id" id="contest_area_id" class="form-control" wire:model='contest_area_id'>
                        <option>---</option>
                        @forelse ( $contestAreas as $contestArea)
                        <option value="{{ $contestArea->id }}">{{ $contestArea->name }}</option>
                        @empty
                        Organizações Militares não cadastradas.
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Último posto da Ativa</label>
                    <select name="candidate_type_id" id="candidate_type_id" class="form-control"
                        wire:model='candidate_type_id'>
                        <option>---</option>
                        @forelse ( $rankDegrees as $rankDegree)
                        <option value="{{ $rankDegree->id }}">{{ $rankDegree->short_name }}</option>
                        @empty
                        Organizações Militares não cadastradas.
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">OM de realização do CPOR/NPOR</label>
                    <input type="text" class="form-control @error('military_organization'){{ 'is-invalid' }}@enderror"
                        wire:model='military_organization' name="military_organization"
                        placeholder="OM de realização do CPOR/NPOR">
                    <span class="invalid-feedback"> @error('military_organization') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-4">
                    <label class="form-label">Notal Final no CPOR/NPOR</label>
                    <input type="text" class="form-control @error('course_score'){{ 'is-invalid' }}@enderror"
                        wire:model='course_score' name="course_score" placeholder="Ex: 8.50">
                    <span class="invalid-feedback"> @error('course_score') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Tuma de Formação (Ano)</label>
                    <input type="year" class="form-control @error('graduation_class'){{ 'is-invalid' }}@enderror"
                        maxlength="4" wire:model='graduation_class' name="graduation_class" placeholder="Ex: 2016">
                    <span class="invalid-feedback"> @error('graduation_class') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Tempo de Serviço nas Forças Armadas</label>
                    <input type="number" class="form-control @error('year_service_time'){{ 'is-invalid' }}@enderror" min="0" max="8"
                        wire:model='year_service_time' name=year_service_time placeholder="ANOS">
                    <span class="invalid-feedback"> @error('year_service_time') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">&nbsp;</label>
                    <input type="number" class="form-control @error('month_service_time'){{ 'is-invalid' }}@enderror" min="0" max="12"
                        wire:model='month_service_time' name=month_service_time placeholder="MÊSES">
                    <span class="invalid-feedback"> @error('year_service_time') {{ $message }} @enderror </span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">&nbsp;</label>
                    <input type="number" class="form-control @error('day_service_time'){{ 'is-invalid' }}@enderror" min="0" max="31"
                        wire:model='day_service_time' name=day_service_time placeholder="DIAS">
                    <span class="invalid-feedback"> @error('day_service_time') {{ $message }} @enderror </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <div class="form-label">No período da aiva, sofreu punição disciplinar?</div>
                    <div>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="punishment" wire:model='punishment' wire:click="$set('showPunishmentLevel',true)" value="SIM">
                            <span class="form-check-label">Sim</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="punishment" wire:model='punishment' wire:click="$set('showPunishmentLevel',false)" value="NÃO">
                            <span class="form-check-label">Não</span>
                        </label>
                    </div>
                </div>
            </div>
            @if ($showPunishmentLevel)
                <div class="col-md-12">
                    <div class="form-label">Grau da punição?</div>
                    <div>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="punishment_level" wire:model='punishment_level' value="Leve">
                            <span class="form-check-label">Leve</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="punishment_level" wire:model='punishment_level' value="Média">
                            <span class="form-check-label">Média</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="punishment_level" wire:model='punishment_level' value="Grave">
                            <span class="form-check-label">Grave</span>
                        </label>
                    </div>
                </div>
            @endif

            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Curso de Graduação</label>
                        <input type="text" class="form-control @error('academic_degree_name'){{ 'is-invalid' }}@enderror"
                            wire:model='academic_degree_name' name="academic_degree_name">
                        <span class="invalid-feedback"> @error('academic_degree_name') {{ $message }} @enderror </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Instituição de Formação</label>
                        <input type="text" class="form-control @error('academic_institution_name'){{ 'is-invalid' }}@enderror" min="0" max="12"
                            wire:model='academic_institution_name' name=academic_institution_name placeholder="MÊSES">
                        <span class="invalid-feedback"> @error('year_service_time') {{ $message }} @enderror </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">Cidade</label>
                        <input type="number" class="form-control @error('day_service_time'){{ 'is-invalid' }}@enderror" min="0" max="31"
                            wire:model='day_service_time' name=day_service_time placeholder="DIAS">
                        <span class="invalid-feedback"> @error('day_service_time') {{ $message }} @enderror </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">Ano de Conclusão</label>
                        <input type="number" class="form-control @error('day_service_time'){{ 'is-invalid' }}@enderror" min="0" max="31"
                            wire:model='day_service_time' name=day_service_time placeholder="DIAS">
                        <span class="invalid-feedback"> @error('day_service_time') {{ $message }} @enderror </span>
                    </div>
                </div>

            </div>

        </div>
        <div class="row mb-3">
            <div class="offset-md-9 col-md-3">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-success" style="width: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
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
