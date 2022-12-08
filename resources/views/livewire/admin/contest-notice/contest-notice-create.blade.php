{{-- CREATE MODAL --}}
<div wire:ignore.self class="modal modal-blur fade" id="create_contest_notice-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edital | Cadastrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='create()' method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            @if (!$contestCategories->isEmpty())
                                <div class="mb-3">
                                    <label class="form-label">Categoria</label>
                                    <select class="form-select @error('contest_category'){{ 'is-invalid' }}@enderror" wire:model='contest_category'>
                                        <option selected>....</option>
                                        @foreach ($contestCategories as $contestCategory)
                                        <option value="{{ $contestCategory->id }}">{{ $contestCategory->short_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback"> @error('contest_category') {{ $message }} @enderror</span>
                                </div>
                            @else
                                <div class="mb-3">
                                    <i>Nenhuma <strong>Categoria</strong> cadastrada, por favor <a href="{{route('admin.contest-category')}}"><strong>cadastrar</strong></a> </i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Nome do Edital</label>
                                <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name"
                                    placeholder="Ex: Magistério" wire:model='name'>
                                <span class="invalid-feedback"> @error('name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Ano de Seleção</label>
                                <input type="number" min="2020" class="form-control @error('year'){{ 'is-invalid' }}@enderror" name="year"
                                    placeholder="Ano do Edital" wire:model='year'>
                                <span class="invalid-feedback"> @error('year') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Início das Inscrições</label>
                                <input type="datetime-local" class="form-control @error('initial_inscription'){{ 'is-invalid' }}@enderror" name="initial_inscription"
                                    placeholder="Início das Inscrições" wire:model='initial_inscription'>
                                <span class="invalid-feedback"> @error('initial_inscription') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Fim das Inscrições</label>
                                <input type="datetime-local" class="form-control @error('final_inscription'){{ 'is-invalid' }}@enderror" name="final_inscription"
                                    placeholder="Fim das Inscrições" wire:model='final_inscription'>
                                <span class="invalid-feedback"> @error('final_inscription') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Vencimento GRU</label>
                                <input type="date" class="form-control @error('gru_expiration'){{ 'is-invalid' }}@enderror" name="gru_expiration"
                                    placeholder="Vencimeto GRU" wire:model='gru_expiration'>
                                <span class="invalid-feedback"> @error('gru_expiration') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Idade Mínima</label>
                                <input type="number" class="form-control @error('min_age'){{ 'is-invalid' }}@enderror" name="min_age"
                                    placeholder="Idade Mínima" wire:model='min_age' min="18" max="30">
                                <span class="invalid-feedback"> @error('min_age') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label class="form-label">Idade Maxíma</label>
                                <input type="number" class="form-control @error('max_age'){{ 'is-invalid' }}@enderror" name="max_age"
                                    placeholder="Idade Máxima" wire:model='max_age' min="18" max="45">
                                <span class="invalid-feedback"> @error('max_age') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Maculino | Altura Mínima</label>
                                <input type="text" class="form-control @error('min_male_height'){{ 'is-invalid' }}@enderror" name="min_male_height"
                                    placeholder="Ex: 1.65" wire:model='min_male_height' title="Ex: 1.65">
                                <span class="invalid-feedback"> @error('min_male_height') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Feminino | Altura Mínima</label>
                                <input type="text" class="form-control @error('min_female_height'){{ 'is-invalid' }}@enderror" name="min_female_height"
                                    placeholder="Ex: 1.55" wire:model='min_female_height' title="Ex: 1.55">
                                <span class="invalid-feedback"> @error('min_female_height') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select @error('status'){{ 'is-invalid' }}@enderror" name="status" wire:model='status'>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                <span class="invalid-feedback"> @error('status') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-lime ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
