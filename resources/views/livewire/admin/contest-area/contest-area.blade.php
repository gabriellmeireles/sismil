<div>
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Área</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <a href="#" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#create_contest_area-modal">
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
                        registros
                    </div>
                    <div class="ms-auto text-muted">
                        Campo da Pesquisa
                        <div class="mx-2 d-inline-block">
                            <select wire:model="search_input">
                                <option value="contest_areas.name" selected>Área</option>
                                <option value="contest_categories.short_name" selected>Categoria</option>
                                <option value="contest_notices.name" selected>Edital</option>
                                <option value="cities.full_name">Cidade</option>
                                <option value="states.short_name">Estado</option>
                            </select>
                        </div>
                    </div>
                    <div class="ms-auto text-muted">
                        Pesquisar:
                        <div class="ms-2 d-inline-block">
                            <input type="text" wire:model='search' class="form-control form-control-sm"
                                aria-label="Pesquisar">
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
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th>Categoria</th>
                                    <th>Edital</th>
                                    <th>Editado em</th>
                                    <th>Status</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contestAreas as $contestArea)
                                <tr>
                                    <td class="text-muted">{{ $contestArea->id }}</td>
                                    <td>{{ $contestArea->name }}</td>
                                    <td>{{ $contestArea->city }}</td>
                                    <td>{{ $contestArea->state }}</td>
                                    <td>{{ $contestArea->category }}</td>
                                    <td>{{ $contestArea->notice }}</td>
                                    <td>{{ $contestArea->updated_at->format('j M Y, h:i:s')}}</td>
                                    <td>
                                        {!! ($contestArea->status == 0 ) ? "<span class='p-2 badge bg-orange-lt'>Inativo</span>"
                                        : "<span class='p-2 badge bg-green-lt'>Ativo</span>" !!}
                                    </td>
                                    <td>
                                        <a wire:click.prevent='edit({{ $contestArea }})'
                                            class="btn btn-outline-lime btn-sm">Editar</a>

                                        <a wire:click.prevent='delete({{ $contestArea }})'
                                            class="btn btn-outline-yellow btn-sm">Desativar</<a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9">
                                        <p class="text-center mt-3"> Registros não encontrados</p>
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-center">
                        {{ $contestAreas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  {{--   @include('livewire.admin.contest-area.contest-area-create')
    @include('livewire.admin.contest-area.contest-area-edit')
    @include('livewire.admin.contest-area.contest-area-disable') --}}
