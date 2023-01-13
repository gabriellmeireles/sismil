<?php

namespace App\Http\Livewire\Admin\Profile;

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
        return view('livewire.admin.profile.profile-header');
    }
}
