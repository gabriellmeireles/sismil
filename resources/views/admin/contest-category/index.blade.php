@extends('layouts.pages')

@section('content')
    @livewire('admin.contest-category.contest-category')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddContestCategoryModal', function(event){
      $('#create_contest_category-modal').modal('hide');
    });

    window.addEventListener('showEditContestCategoryModal', function(event){
      $('#edit_contest_category-modal').modal('show');
    });

    window.addEventListener('hideEditContestCategoryModal', function(event){
      $('#edit_contest_category-modal').modal('hide');
    });


    window.addEventListener('showDeleteContestCategoryModal', function(event){
      $('#delete_contest_category-modal').modal('show');
    });

    window.addEventListener('hideDeleteContestCategoryModal', function(event){
      $('#delete_contest_category-modal').modal('hide');
    });

  </script>
@endpush
