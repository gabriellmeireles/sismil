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

    public function create()
    {
        $this->validate();
        try {
            $cma = new ModelsMilitaryCommand();
            $cma->full_name = $this->full_name;
            $cma->short_name = $this->short_name;
            $cma->status = 1;
            $cma->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddCmaModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($cma)
    {
        $this->cma_id = $cma['id'];
        $this->full_name = $cma['full_name'];
        $this->short_name = $cma['short_name'];
        $this->status = $cma['status'];

        $this->dispatchBrowserEvent('showEditCmaModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $cma = ModelsMilitaryCommand::find($this->cma_id);
            $cma->full_name = $this->full_name;
            $cma->short_name = $this->short_name;
            $cma->status = $this->status;
            $cma->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditCmaModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditCmaModal');
       }
    }

    public function delete($cma)
    {
        $this->cma_id = $cma['id'];
        $this->full_name = $cma['full_name'];

        $this->dispatchBrowserEvent('showDeleteCmaModal');
    }

    public function destroy()
    {
        try {
            $cma = ModelsMilitaryCommand::find($this->cma_id);
            $cma->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteCmaModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteCmaModal');
        }
    }


    public function render()
    {
        return view('livewire.admin.military-command.military-command', [
            'cmas' => ModelsMilitaryCommand::where($this->search_input, 'like', '%'.$this->search.'%')
                                        ->orderBy('id')
                                        ->paginate($this->per_page),
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
