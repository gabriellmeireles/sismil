@extends('layouts.pages')
@section('page-title', 'Configuração do Edital - '. config('app.name'))
@section('content')
    @livewire('admin.contest-notice.contest-notice')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddContestNoticeModal', function(event){
      $('#create_contest_notice-modal').modal('hide');
    });

    window.addEventListener('showEditContestNoticeModal', function(event){
      $('#edit_contest_notice-modal').modal('show');
    });

    window.addEventListener('hideEditContestNoticeModal', function(event){
      $('#edit_contest_notice-modal').modal('hide');
    });


    window.addEventListener('showDeleteContestNoticeModal', function(event){
      $('#delete_contest_notice-modal').modal('show');
    });

    window.addEventListener('hideDeleteContestNoticeModal', function(event){
      $('#delete_contest_notice-modal').modal('hide');
    });

  </script>
@endpush
