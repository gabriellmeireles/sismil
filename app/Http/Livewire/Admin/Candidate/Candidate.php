<?php

namespace App\Http\Livewire\Admin\Candidate;

use App\Models\Candidate as ModelsCandidate;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Candidate extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'users.name';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $photo, $name, $cpf, $email, $phone,  $candidate_type, $nationality, $user_type, $candidate_id, $user_id, $status;

    protected $listeners = [
        'resetForm'
    ];

    public function showEventMessage($message, $type)
    {
        return $this->dispatchBrowserEvent('showEventMessage',[
            'message' => $message,
            'type' => $type,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.candidate.candidate',[
            'candidates' => User::select('users.id',
                                        'candidates.photo',
                                        'users.name',
                                        'users.cpf',
                                        'users.email',
                                        'candidate_phones.ddd',
                                        'candidate_phones.number',
                                        "candidate_types.name AS user_type_name",
                                        'candidates.nationality')
                                ->leftJoin('candidates', 'candidates.user_id', 'users.id')
                                ->leftJoin('candidate_types', 'candidate_types.id', 'candidates.candidate_type_id')
                                ->leftJoin('candidate_phones', 'candidate_phones.candidate_id', 'candidate_id')
                                ->where('users.user_type_id', 0)
                                ->where($this->search_input, 'like', '%'.$this->search.'%')
                                ->orderBy('candidates.id')
                                ->paginate($this->per_page),
        ]);
    }


}
