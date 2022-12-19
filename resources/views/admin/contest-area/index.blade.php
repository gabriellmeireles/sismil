@extends('layouts.pages')
@section('page-title', 'Áreas do Edital - '. config('app.name'))

@section('content')
    @livewire('admin.contest-area.contest-area')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddContestAreaModal', function(event){
      $('#create_contest_area-modal').modal('hide');
    });

    window.addEventListener('showEditContestAreaModal', function(event){
      $('#edit_contest_area-modal').modal('show');
    });

    window.addEventListener('hideEditContestAreaModal', function(event){
      $('#edit_contest_area-modal').modal('hide');
    });


    window.addEventListener('showDeactivateContestAreaModal', function(event){
      $('#deactivate_contest_area-modal').modal('show');
    });

    window.addEventListener('hideDeactivateContestAreaModal', function(event){
      $('#deactivate_contest_area-modal').modal('hide');
    });

  </script>
@endpush
