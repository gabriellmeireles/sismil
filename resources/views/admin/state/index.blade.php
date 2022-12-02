@extends('layouts.pages')

@section('content')
    @livewire('admin.state.state')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddStateModal', function(event){
      $('#create_state-modal').modal('hide');
    });

    window.addEventListener('showEditStateModal', function(event){
      $('#edit_state-modal').modal('show');
    });

    window.addEventListener('hideEditStateModal', function(event){
      $('#edit_state-modal').modal('hide');
    });


    window.addEventListener('showDeleteStateModal', function(event){
      $('#delete_state-modal').modal('show');
    });

    window.addEventListener('hideDeleteStateModal', function(event){
      $('#delete_state-modal').modal('hide');
    });

  </script>
@endpush