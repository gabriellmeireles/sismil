<div>
    {{-- @dd($admins) --}}
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">Militares</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="#" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#create_admin-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Novo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                      <div class="text-muted">
                        Mostrar
                        <div class="mx-2 d-inline-block">
                          <select wire:model="per_page">
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                        </div>
                        usuários
                      </div>
                      <div class="ms-auto text-muted">
                        Campo da Pesquisa
                        <div class="mx-2 d-inline-block">
                          <select wire:model="search_input">
                            <option value="users.name" selected>Nome</option>
                            <option value="admins.war_name">Nome de Guerra</option>
                            <option value="user_types.name">Perfil</option>
                          </select>
                        </div>
                        
                      </div>
                      <div class="ms-auto text-muted">
                        Pesquisar:
                        <div class="ms-2 d-inline-block">
                          <input type="text" wire:model='search' class="form-control form-control-sm" aria-label="Pesquisar">
                        </div>
                      </div>
                    </div>
                </div>
    
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>P/G</th>
                                        <th>Nome de Guerra</th>
                                        <th>Arma</th>
                                        <th>Seção</th>
                                        <th>Perfil</th>
                                        <th>Status</th>
                                        <th>Opções</th>
                                    </tr>
    
    
                                </thead>
                                <tbody>
                                    @forelse ($admins as $admin)
                                    <tr>
                                        <td class="text-muted">{{ $admin->id }}</td>
                                        <td>{{ $admin->user->name }}</td>
                                        <td>{{ $admin->rankDegree->short_name}}</td>
                                        <td>{{ $admin->war_name }}</td>
                                        <td>{{ $admin->combatArm->short_name }}</td>
                                        <td>{{ $admin->section->short_name }}</td>
                                        <td>{{ $admin->user->userType->name }}</td>
                                        <td> 
                                            {!! ($admin->user->status == 0 ) ? "<span class='p-2 badge bg-orange-lt'>Inativo</span>" : "<span class='p-2 badge bg-green-lt'>Ativo</span>" !!}
                                        </td>
                                        <td>
                                            <a wire:click.prevent='edit({{ $admin }})' class="btn btn-outline-lime btn-sm">Editar</a>
                                            
                                            <a wire:click.prevent='delete({{ $admin }})' class="btn btn-outline-yellow btn-sm">Desativar</<a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9"><p class="text-center mt-3"> Não há usuários cadastrados</p></td>
                                    </tr>
                                    @endforelse
    
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-center">
                            {{ $admins->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- CREATE MODAL --}}
        <div wire:ignore.self class="modal modal-blur fade" id="create_admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Militares | Cadastrar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent='create()' method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label">Nome</label>
                                        <input type="text" class="form-control"  placeholder="Nome Completo" wire:model='name'>
                                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">CPF</label>
                                        <input type="text" class="form-control"  placeholder="CPF" maxlength="11" wire:model='cpf'>
                                        <span class="text-danger">@error('cpf'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" wire:model='email'>
                                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Perfil</label>
                                        <select class="form-select" wire:model='user_type'>
                                            <option selected>....</option>
                                            @foreach ($userTypes as $userType)
                                            <option value="{{ $userType->id }}">{{ $userType->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('user_type'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Seção</label>
                                        <select class="form-select" wire:model='section'>
                                            <option selected>....</option>
                                            @foreach ($allSections as $section)
                                            <option value="{{ $section->id }}">{{ $section->short_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('section'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
        
                            {{-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Senha</label>
                                        <input type="password" class="form-control" placeholder="Senha" wire:model='password'>
                                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                    </div>
                                </div>
        
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Repita Senha</label>
                                        <input type="password" class="form-control" placeholder="Repita a Senha" wire:model='repeat_password'>
                                        <span class="text-danger">@error('repeat_password'){{ $message }}@enderror</span>
                                    </div>
                                </div>
        
                            </div> --}}
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Posto/Grasuação</label>
                                        <select class="form-select" wire:model='rank_degree'>
                                            <option selected>....</option>
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
                                            <option selected>....</option>
                                            @foreach ($combatArms as $combatArm)
                                            <option value="{{ $combatArm->id }}">{{ $combatArm->short_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('combat_arm'){{ $message }}@enderror</span>
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
                                            <option value="{{ $userType->id }}">{{ $userType->name}}</option>
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
    
        {{-- DELETE MODAL --}}
        <div wire:ignore.self class="modal modal-blur fade" id="delete_admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                   <form wire:submit.prevent='destroy()' method="POST">
                        <div class="modal-body">
                            <div class="modal-title">Tem certeza?</div>
                            <div>Você realmente quer deletar esse usuário? <h3 class="text-center mt-2"> {{ $rank_degree .' - '. $war_name}}</h3></div>
                        </div>
                        <input type="hidden" wire:model='user_id'>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Sim, deletar</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>