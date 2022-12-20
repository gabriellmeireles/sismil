{{-- EDIT MODAL --}}
<div wire:ignore.self class="modal modal-blur fade" id="edit_contest_area-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Área | Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='update()' method="POST">
                <div class="modal-body">
                    <input type="hidden" wire:model='contest_area_id'>
                    <div class="row">
                        <div class="mb-3">
                            <div class="form-label">Categoria</div>
                            @if (!$contestCategories->isEmpty())
                                <div>
                                    @foreach ( $contestCategories as $contestCategory )
                                        <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="{{ $contestCategory->id }}" name="contest_category_id" wire:model='contest_category_id'>
                                        <span class="form-check-label">{{ $contestCategory->short_name}}</span>
                                    </label>
                                    @endforeach
                                </div>
                                <span class="text-danger">@error('contest_category_id'){{ $message }}@enderror</span>
                            @else
                            <div class="mb-3">
                                <i>Nenhuma <strong>Categoria</strong> cadastrada, por favor <a href="{{route('admin.contest-category')}}"><strong>cadastrar</strong></a> </i>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Edital</label>
                                <select class="form-select @error('contest_notice_id'){{ 'is-invalid' }}@enderror" wire:model='contest_notice_id'>
                                    <option selected>....</option>
                                    @if (!$contestNotices->isEmpty())
                                        @foreach ($contestNotices as $contestNotice)
                                            <option value="{{ $contestNotice->id }}">{{ $contestNotice->contestCategory->short_name }} - {{ $contestNotice->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">@error('contest_notice_id'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @if (!$cities->isEmpty())
                                <div class="mb-3">
                                    <label class="form-label">Cidade</label>
                                    <select class="form-select @error('city_id'){{ 'is-invalid' }}@enderror" wire:model='city_id'>
                                        <option selected>....</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->full_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('city_id'){{ $message }}@enderror</span>
                                </div>
                            @else
                                <div class="mb-3">
                                    <i>Nenhuma <strong>Cidade</strong> cadastrada, por favor <a href="{{route('admin.city')}}"><strong>cadastrar</strong></a> </i>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" attribute="Nome" class="form-control @error('name'){{ 'is-invalid' }}@enderror"  placeholder="Nome da Área" wire:model='name'>
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select @error('status'){{ 'is-invalid' }}@enderror" wire:model='status'>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                <span class="text-danger">@error('status'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-label mb-3">Requerimentos da Área</div>
                                @if (!$areaRequirements->isEmpty())
                                    @foreach ($areaRequirements as $areaRequirement)
                                        <label class="col-md-4 form-check form-switch form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="{{ $areaRequirement->id }}" wire:model='area_requirement_id'>
                                            <span class="form-check-label">{{ $areaRequirement->name }}</span>
                                        </label>
                                    @endforeach
                                @else
                                    <div class="mb-3">
                                        <i>Nenhum <strong>Requerimento</strong> cadastrado, por favor <a href="{{route('admin.area-requirement')}}"><strong>cadastrar</strong></a> </i>
                                    </div>
                                @endif
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
