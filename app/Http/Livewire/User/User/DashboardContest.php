<?php

namespace App\Http\Livewire\User\User;

use App\Models\Candidate;
use App\Models\Form;
use App\Models\ContestNotice;
use Livewire\Component;

class DashboardContest extends Component
{
    public function register($contest)
    {
        $this->emit('contestRegister', $contest);
        return redirect()->route('user.contest-register');
    }

    public function render()
    {
        return view('livewire.user.user.dashboard-contest',[
            'contests' => ContestNotice::where('status', 1)->get(),
            'candidateForm' => Form::where('candidate_id', Candidate::where('user_id', auth()->user()->id)->first())->get(),
        ]);
    }
}
