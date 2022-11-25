<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Navbar extends Component
{
    public $admin;
    
    protected $listeners = [
        /* 'updateAdminTopHeader' => '$refresh' */
        'updateNavbar' => '$refresh'
    ];

    public function mount(){
        $this->admin = User::find(auth('web')->id());
    }
    
    public function render()
    {
        return view('livewire.admin.navbar');
    }
}
