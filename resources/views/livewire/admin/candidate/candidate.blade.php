<div>
    {{-- @dd($candidates) --}}
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">Candidatos</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="#" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#create_candidate-modal">
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
                            <option value="users.cpf">CPF</option>
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
                                        <th>Foto</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Tipo Candidato</th>
                                        <th>Nacionalidade</th>
                                        <th>Opções</th>
                                    </tr>


                                </thead>
                                <tbody>
                                    @forelse ($candidates as $candidate)
                                    <tr>
                                        <td class="text-muted">{{ $candidate->id }}</td>
                                        <td>{{ $candidate->photo }}</td>
                                        <td>{{ $candidate->name }}</td>
                                        <td>{{ $candidate->cpf}}</td>
                                        <td>{{ $candidate->email }}</td>
                                        <td>{{ $candidate->ddd }} {{ $candidate->number }}</td>
                                        <td>{{ $candidate->user_type_name }}</td>
                                        <td>{{ $candidate->nationality }}</td>
                                        <td>
                                            <a wire:click.prevent='edit({{ $candidate }})' class="btn btn-outline-lime btn-sm">Editar</a>

                                            <a wire:click.prevent='delete({{ $candidate }})' class="btn btn-outline-yellow btn-sm">Desativar</<a>
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
                            {{ $candidates->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('livewire.admin.candidate.candidate-create')
        @include('livewire.admin.candidate.candidate-edit')
        @include('livewire.admin.candidate.candidate-disable') --}}
