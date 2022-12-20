<?php

namespace App\Http\Livewire\Admin\CandidateType;

use App\Models\CandidateType as ModelsCandidateType;
use Livewire\Component;
use Livewire\WithPagination;

class CandidateType extends Component
{
    public $name, $status;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'name';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'name' => 'required|string',
        'status' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    protected $listeners = [
        'resetForm'
    ];

    public function resetForm()
    {
        $this->name = $this->status = null;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.candidate-type.candidate-type',[
            'candidateTypes' => ModelsCandidateType::where($this->search_input, 'like', '%'.$this->search.'%')
                                                ->orderBy('id')
                                                ->paginate($this->per_page)
        ]);
    }

    public function showEventMessage($message, $type)
    {
        return $this->dispatchBrowserEvent('showEventMessage',[
            'message' => $message,
            'type' => $type,
        ]);
    }
}
