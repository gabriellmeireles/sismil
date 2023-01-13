<?php

namespace App\Http\Livewire\User\User;

use App\Models\User;
use Livewire\Component;

class ProfileHeader extends Component
{
    public $user;

    protected $listeners = [
        'updateProfileHeader' => '$refresh'
    ];

    public function mount()
    {
        $this->user = User::find(auth('web')->id());
    }

    public function render()
    {
        return view('livewire.user.user.profile-header');
    }
}
