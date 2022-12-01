{{-- CREATE MODAL --}}
<div wire:ignore.self class="modal modal-blur fade" id="create_rm-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Região Militar | Cadastrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='create()' method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (!$cmas->isEmpty())
                                <div class="mb-3">
                                    <label class="form-label">Comando Militar de Área</label>
                                    <select class="form-select @error('military_command'){{ 'is-invalid' }}@enderror" wire:model='military_command'>
                                        <option selected>....</option>
                                        @foreach ($cmas as $cma)
                                        <option value="{{ $cma->id }}">{{ $cma->full_name}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            @else
                                <div class="mb-3">
                                    <i>Nenhum <strong>Comando Militar de Área</strong> cadastrado, por favor <a href="{{route('admin.military-command')}}"><strong>cadastrar</strong></a> </i>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" attribute="Nome" class="form-control @error('full_name'){{ 'is-invalid' }}@enderror"  placeholder="Nome da Região Militar" wire:model='full_name'>
                                <span class="text-danger">@error('full_name'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Sigla</label>
                                <input type="text" class="form-control @error('short_name'){{ 'is-invalid' }}@enderror"  placeholder="Sigla" wire:model='short_name'>
                                <span class="text-danger">@error('short_name'){{ $message }}@enderror</span>
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