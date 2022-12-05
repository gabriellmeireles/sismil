@extends('layouts.pages')
@section('page-title', 'Estado - '. config('app.name'))
@section('content')
    @livewire('admin.section.section')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddSectionModal', function(event){
      $('#create_section-modal').modal('hide');
    });

    window.addEventListener('showEditSectionModal', function(event){
      $('#edit_section-modal').modal('show');
    });

    window.addEventListener('hideEditSectionModal', function(event){
      $('#edit_section-modal').modal('hide');
    });


    window.addEventListener('showDeleteSectionModal', function(event){
      $('#delete_section-modal').modal('show');
    });

    window.addEventListener('hideDeleteSectionModal', function(event){
      $('#delete_section-modal').modal('hide');
    });

  </script>
@endpush