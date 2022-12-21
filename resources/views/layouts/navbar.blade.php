@if (Auth::user()->user_type_id == 0 )
    @livewire('user.navbar')
@else
    @livewire('admin.navbar')
@endif
