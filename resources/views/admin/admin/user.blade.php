@extends('layouts.pages')
@section('page-title', 'Militares - '. config('app.name'))
@section('content')
  @livewire('admin.admin.admin-user')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddAdminModal', function(event){
      $('#create_admin-modal').modal('hide');
    });

    window.addEventListener('showEditAdminModal', function(event){
      $('#edit_admin-modal').modal('show');
    });

    window.addEventListener('hideEditAdminModal', function(event){
      $('#edit_admin-modal').modal('hide');
    });


    window.addEventListener('showDeleteAdminModal', function(event){
      $('#delete_admin-modal').modal('show');
    });

    window.addEventListener('hideDeleteAdminModal', function(event){
      $('#delete_admin-modal').modal('hide');
    });

  </script>
@endpush
