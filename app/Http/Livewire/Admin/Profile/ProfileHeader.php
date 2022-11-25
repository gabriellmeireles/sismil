<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Livewire\Component;

class ProfileHeader extends Component
{

    public $admin;

    protected $listeners = [
        'updateProfileHeader' => '$refresh'
    ];

    public function mount()
    {
        $this->admin = Admin::find(auth('web')->id());
    }

    public function render()
    {
        return view('livewire.admin.profile.profile-header');
    }
}
