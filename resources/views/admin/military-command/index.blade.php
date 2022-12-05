@extends('layouts.pages')
@section('page-title', 'Comando Militar - '. config('app.name'))
@section('content')
    @livewire('admin.military-command.military-command')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddCmaModal', function(event){
      $('#create_cma-modal').modal('hide');
    });

    window.addEventListener('showEditCmaModal', function(event){
      $('#edit_cma-modal').modal('show');
    });

    window.addEventListener('hideEditCmaModal', function(event){
      $('#edit_cma-modal').modal('hide');
    });


    window.addEventListener('showDeleteCmaModal', function(event){
      $('#delete_cma-modal').modal('show');
    });

    window.addEventListener('hideDeleteCmaModal', function(event){
      $('#delete_cma-modal').modal('hide');
    });

  </script>
@endpush