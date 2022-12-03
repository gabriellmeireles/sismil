@extends('layouts.pages')

@section('content')
    @livewire('admin.city.city')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddCityModal', function(event){
      $('#create_city-modal').modal('hide');
    });

    window.addEventListener('showEditCityModal', function(event){
      $('#edit_city-modal').modal('show');
    });

    window.addEventListener('hideEditCityModal', function(event){
      $('#edit_city-modal').modal('hide');
    });


    window.addEventListener('showDeleteCityModal', function(event){
      $('#delete_city-modal').modal('show');
    });

    window.addEventListener('hideDeleteCityModal', function(event){
      $('#delete_city-modal').modal('hide');
    });

  </script>
@endpush