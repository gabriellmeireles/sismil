@extends('layouts.pages')
@section('page-title', 'Tipo de Candidato - '. config('app.name'))
@section('content')
    @livewire('admin.candidate-type.candidate-type')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddCandidateTypeModal', function(event){
      $('#create_candidate_type-modal').modal('hide');
    });

    window.addEventListener('showEditCandidateTypeModal', function(event){
      $('#edit_candidate_type-modal').modal('show');
    });

    window.addEventListener('hideEditCandidateTypeModal', function(event){
      $('#edit_candidate_type-modal').modal('hide');
    });

    window.addEventListener('showDeactivateCandidateTypeModal', function(event){
      $('#deactivate_candidate_type-modal').modal('show');
    });

    window.addEventListener('hideDeactivateCandidateTypeModal', function(event){
      $('#deactivate_candidate_type-modal').modal('hide');
    });

  </script>
@endpush
