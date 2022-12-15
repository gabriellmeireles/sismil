@extends('layouts.pages')
@section('page-title', 'Exigências da Área - '. config('app.name'))

@section('content')
    @livewire('admin.area-requirement.area-requirement')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddAreaRequirementModal', function(event){
      $('#create_area_requirement-modal').modal('hide');
    });

    window.addEventListener('showEditAreaRequirementModal', function(event){
      $('#edit_area_requirement-modal').modal('show');
    });

    window.addEventListener('hideEditAreaRequirementModal', function(event){
      $('#edit_area_requirement-modal').modal('hide');
    });


    window.addEventListener('showDeleteAreaRequirementModal', function(event){
      $('#delete_area_requirement-modal').modal('show');
    });

    window.addEventListener('hideDeleteAreaRequirementModal', function(event){
      $('#delete_area_requirement-modal').modal('hide');
    });

  </script>
@endpush
