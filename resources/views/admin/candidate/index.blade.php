@extends('layouts.pages')
@section('page-title', 'Candidato - '. config('app.name'))
@section('content')
    @livewire('admin.candidate.candidate')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddCandidateModal', function(event){
      $('#create_candidate-modal').modal('hide');
    });

    window.addEventListener('showEditCandidateModal', function(event){
      $('#edit_candidate-modal').modal('show');
    });

    window.addEventListener('hideEditCandidateModal', function(event){
      $('#edit_candidate-modal').modal('hide');
    });


    window.addEventListener('showDeleteCandidateModal', function(event){
      $('#delete_candidate-modal').modal('show');
    });

    window.addEventListener('hideDeleteCandidateModal', function(event){
      $('#delete_candidate-modal').modal('hide');
    });

  </script>
@endpush
