<?php

namespace App\Http\Livewire\Admin\ContestSetting;

use App\Models\ContestSetting as ModelsContestSetting;
use Livewire\Component;
use Livewire\WithPagination;

class ContestSetting extends Component
{
    public $full_name, $short_name, $status;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'short_name';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'full_name' => 'required|string',
        'short_name' => 'required|string',
        'year' => 'required',
        'initial_inscription' => 'required',
        'final_inscription' => 'required',
        'gru_expiration' => 'required',
        'min_age' => 'required',
        'max_age' => 'required',
        'min_male_height' => 'required',
        'min_female_height' => 'required',
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
        $this->full_name = $this->short_name = $this->status = null;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.contest-setting.contest-setting',[
            'contest-settings' => ModelsContestSetting::where($this->search_input, 'like', '%'.$this->search.'%')
                                                        ->orderBy('id')
                                                        ->paginate($this->per_page),
        ]);
    }
}
