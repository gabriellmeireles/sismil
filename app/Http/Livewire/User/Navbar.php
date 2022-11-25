<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Navbar extends Component
{
    public $user;
    
    protected $listeners = [
        /* 'updateAdminTopHeader' => '$refresh' */
        'updateNavbar' => '$refresh'
    ];

    public function mount(){
        $this->user = User::find(auth('web')->id());
    }

    public function render()
    {
        return view('livewire.user.navbar');
    }
}
