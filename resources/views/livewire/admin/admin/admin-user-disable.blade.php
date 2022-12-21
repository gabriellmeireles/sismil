{{-- DISABLE MODAL --}}
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
