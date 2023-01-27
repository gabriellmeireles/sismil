<?php

namespace App\Http\Livewire\User\Form;

use App\Models\ContestNotice;
use Livewire\Component;

class ContestOpened extends Component
{

    public $contests;

    public function mount()
    {
        $this->contests = ContestNotice::all()->where('status', 1);
    }

    public function render()
    {
        return view('livewire.user.form.contest-opened');
    }
}
