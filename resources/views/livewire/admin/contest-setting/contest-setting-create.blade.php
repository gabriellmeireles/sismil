{{-- CREATE MODAL --}}
<div wire:ignore.self class="modal modal-blur fade" id="create_contest_setting-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Configuração do Edital | Cadastrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='create()' method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Edital</label>
                            <select class="form-select" name="contest_notice_id" @error('contest_notice_id'){{ 'is-invalid' }}@enderror wire:model='contest_notice_id'>
                                    <option selected disabled>-----</option>
                                    <option value="1">MFDV</option>
                                    <option value="1">TI</option>
                                    <option value="1">DIREITO</option>
                                    <option value="1">CAPELÃO</option>
                            </select>
                            <span class="invalid-feedback"> @error('contest_notice_id') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Ano de Seleção</label>
                            <input type="year" class="form-control @error('year'){{ 'is-invalid' }}@enderror" name="year"
                                placeholder="Ano do Edital" wire:model='year'>
                            <span class="invalid-feedback"> @error('year') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Início das Inscrições</label>
                            <input type="date" class="form-control @error('initial_inscription'){{ 'is-invalid' }}@enderror" name="initial_inscription"
                                placeholder="Início das Inscrições" wire:model='initial_inscription'>
                            <span class="invalid-feedback"> @error('initial_inscription') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Fim das Inscrições</label>
                            <input type="date" class="form-control @error('final_inscription'){{ 'is-invalid' }}@enderror" name="final_inscription"
                                placeholder="Início das Inscrições" wire:model='final_inscription'>
                            <span class="invalid-feedback"> @error('final_inscription') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Vencimento GRU</label>
                            <input type="date" class="form-control @error('gru_date'){{ 'is-invalid' }}@enderror" name="gru_date"
                                placeholder="Início das Inscrições" wire:model='gru_date'>
                            <span class="invalid-feedback"> @error('gru_date') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Idade Mínima</label>
                            <input type="number" class="form-control @error('min_age'){{ 'is-invalid' }}@enderror" name="min_age"
                                placeholder="Início das Inscrições" wire:model='min_age' min="18" max="30">
                            <span class="invalid-feedback"> @error('min_age') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Idade Maxíma</label>
                            <input type="number" class="form-control @error('min_age'){{ 'is-invalid' }}@enderror" name="min_age"
                                placeholder="Início das Inscrições" wire:model='min_age' min="18" max="45">
                            <span class="invalid-feedback"> @error('min_age') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Maculino | Altura Mínima</label>
                            <input type="text" class="form-control @error('min_male_height'){{ 'is-invalid' }}@enderror" name="min_male_height"
                                placeholder="Ex: 1.65" wire:model='min_male_height' min="18" max="45">
                            <span class="invalid-feedback"> @error('min_male_height') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Feminino | Altura Mínima</label>
                            <input type="text" class="form-control @error('min_female_height'){{ 'is-invalid' }}@enderror" name="min_female_height"
                                placeholder="Ex: 1.55" wire:model='min_female_height' min="18" max="45">
                            <span class="invalid-feedback"> @error('min_female_height') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" wire:model='status'>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-success" style="width: 100%;">
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
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
    </div>
</div>
