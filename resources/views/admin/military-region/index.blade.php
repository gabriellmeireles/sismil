@extends('layouts.pages')
@section('page-title', 'Região Militar - '. config('app.name'))
@section('content')
    @livewire('admin.military-region.military-region')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddRmModal', function(event){
      $('#create_rm-modal').modal('hide');
    });

    window.addEventListener('showEditRmModal', function(event){
      $('#edit_rm-modal').modal('show');
    });

    window.addEventListener('hideEditRmModal', function(event){
      $('#edit_rm-modal').modal('hide');
    });


    window.addEventListener('showDeleteRmModal', function(event){
      $('#delete_rm-modal').modal('show');
    });

    window.addEventListener('hideDeleteRmModal', function(event){
      $('#delete_rm-modal').modal('hide');
    });

  </script>
@endpush