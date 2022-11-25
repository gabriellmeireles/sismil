@if (Auth::user()->user_type_id == 7 )
    @livewire('user.navbar')
@else
    @livewire('admin.navbar')
@endif
