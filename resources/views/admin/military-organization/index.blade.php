@extends('layouts.pages')
@section('page-title', 'Organização Militar - '. config('app.name'))
@section('content')
    @livewire('admin.military-organization.military-organization')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddOmModal', function(event){
      $('#create_om-modal').modal('hide');
    });

    window.addEventListener('showEditOmModal', function(event){
      $('#edit_om-modal').modal('show');
    });

    window.addEventListener('hideEditOmModal', function(event){
      $('#edit_om-modal').modal('hide');
    });


    window.addEventListener('showDeleteOmModal', function(event){
      $('#delete_om-modal').modal('show');
    });

    window.addEventListener('hideDeleteOmModal', function(event){
      $('#delete_om-modal').modal('hide');
    });

  </script>
@endpush