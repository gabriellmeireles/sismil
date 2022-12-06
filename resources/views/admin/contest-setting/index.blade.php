@extends('layouts.pages')
@section('page-title', 'Configuração do Edital - '. config('app.name'))
@section('content')
    @livewire('admin.contest-setting.contest-setting')
@endsection

@push('scripts')
  <script>
    $(window).on('hidden.bs.modal', function(){
        Livewire.emit('resetForm');
    });

    window.addEventListener('hideAddContestSettingModal', function(event){
      $('#create_contest_setting-modal').modal('hide');
    });

    window.addEventListener('showEditContestSettingModal', function(event){
      $('#edit_contest_setting-modal').modal('show');
    });

    window.addEventListener('hideEditContestSettingModal', function(event){
      $('#edit_contest_setting-modal').modal('hide');
    });


    window.addEventListener('showDeleteContestSettingModal', function(event){
      $('#delete_contest_setting-modal').modal('show');
    });

    window.addEventListener('hideDeleteContestSettingModal', function(event){
      $('#delete_contest_setting-modal').modal('hide');
    });

  </script>
@endpush
