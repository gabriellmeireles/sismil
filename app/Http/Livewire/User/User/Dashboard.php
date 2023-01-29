<?php

namespace App\Http\Livewire\User\User;

use App\Models\Candidate;
use App\Models\Form;
use App\Models\ContestNotice;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.user.user.dashboard',[
            'contests' => ContestNotice::where('status', 1)->get(),
            'candidateForm' => Form::where('candidate_id', Candidate::where('user_id', auth()->user()->id)->first())->get(),
        ]);
    }
}
