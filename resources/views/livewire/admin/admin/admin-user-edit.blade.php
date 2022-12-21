{{-- EDIT MODAL --}}
<div wire:ignore.self class="modal modal-blur fade" id="edit_admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Militares | Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='update()' method="POST">
                <div class="modal-body">
                    <input type="hidden" wire:model='user_id'>
                    <input type="hidden" wire:model='admin_id'>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control"  placeholder="Nome Completo" id="name" wire:model='name'>
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" class="form-control" placeholder="CPF" maxlength="11" id="cpf" wire:model='cpf'>
                                <span class="text-danger">@error('cpf'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" wire:model='email'>
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Perfil</label>
                                <select class="form-select" wire:model='user_type'>
                                    @foreach ($userTypes as $userType)
                                        @if (Auth::user()->user_type_id != 1)
                                            @if($userType->id != 0)
                                                <option value="{{ $userType->id }}">{{ $userType->name}}</option>
                                            @endif
                                        @else
                                            <option value="{{ $userType->id }}">{{ $userType->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('user_type'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Seção</label>
                                <select class="form-select" wire:model='section'>
                                    @foreach ($allSections as $section)
                                    <option value="{{ $section->id }}">{{ $section->short_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('section'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Posto/Grasuação</label>
                                <select class="form-select" wire:model='rank_degree'>
                                    @foreach ($rankDegrees as $rankDegree)
                                        <option value="{{ $rankDegree->id }}">{{ $rankDegree->short_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('rank_degree'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nome de Guerra</label>
                                <input type="text" class="form-control" placeholder="Nome de Guerra" wire:model='war_name'>
                                <span class="text-danger">@error('war_name'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Arma/Quadro/Serviço</label>
                                <select class="form-select" wire:model='combat_arm'>
                                    @foreach ($combatArms as $combatArm)
                                    <option value="{{ $combatArm->id }}">{{ $combatArm->short_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('combat_arm'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" wire:model='status'>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                <span class="text-danger">@error('status'){{ $message }}@enderror</span>
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
