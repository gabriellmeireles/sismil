<?php

namespace App\Http\Livewire\Admin\MilitaryRegion;

use App\Models\MilitaryCommand;
use App\Models\MilitaryRegion as ModelsMilitaryRegion;
use Livewire\Component;
use Livewire\WithPagination;

class MilitaryRegion extends Component
{

    /**
     * Pagination config
     * DataTable config
     */

    public $full_name, $short_name, $status, $military_command;

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
        'military_command' => 'required',
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
        $this->full_name = $this->short_name = $this->status = $this->military_command = null;
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        try {
            $rm = new ModelsMilitaryRegion();
            $rm->full_name = $this->full_name;
            $rm->short_name = $this->short_name;
            $rm->status = 1;
            $rm->military_command_id = $this->military_command;
            $rm->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddRmModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($rm)
    {
        $this->crm_id = $rm['id'];
        $this->full_name = $rm['full_name'];
        $this->short_name = $rm['short_name'];
        $this->military_command = $rm['military_command_id'];
        $this->status = $rm['status'];

        $this->dispatchBrowserEvent('showEditRmModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $rm = ModelsMilitaryRegion::find($this->rm_id);
            $rm->full_name = $this->full_name;
            $rm->short_name = $this->short_name;
            $rm->status = $this->status;
            $rm->military_command = $this->military_command;
            $rm->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditRmModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditRmModal');
       }
    }

    public function delete($rm)
    {
        $this->rm_id = $rm['id'];
        $this->full_name = $rm['full_name'];

        $this->dispatchBrowserEvent('showDeleteRmModal');
    }

    public function destroy()
    {
        try {
            $rm = ModelsMilitaryRegion::find($this->rm_id);
            $rm->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteRmModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteRmModal');
        }
    }
    
    public function render()
    {
        return view('livewire.admin.military-region.military-region', [
            'rms' => ModelsMilitaryRegion::where($this->search_input, 'like', '%'.$this->search.'%')
                                        ->orderBy('id')
                                        ->paginate($this->per_page),
            'cmas' => MilitaryCommand::where('status', '=', 1)->get(),
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
