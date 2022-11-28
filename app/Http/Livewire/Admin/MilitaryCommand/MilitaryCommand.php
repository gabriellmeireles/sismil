<?php

namespace App\Http\Livewire\Admin\MilitaryCommand;

use App\Models\MilitaryCommand as ModelsMilitaryCommand;
use Livewire\Component;
use Livewire\WithPagination;

class MilitaryCommand extends Component
{
    /**
     * Pagination config
     * DataTable config
     */

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

    public function render()
    {
        return view('livewire.admin.military-command.military-command', [
            'cmas' => ModelsMilitaryCommand::where($this->search_input, 'like', '%'.$this->search.'%')
                                        ->orderBy('id')
                                        ->paginate($this->per_page),
        ]);
    }
}
