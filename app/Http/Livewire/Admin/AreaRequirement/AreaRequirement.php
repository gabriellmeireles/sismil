<?php

namespace App\Http\Livewire\Admin\AreaRequirement;

use App\Models\AreaRequirement as ModelsAreaRequirement;
use Livewire\Component;
use Livewire\WithPagination;

class AreaRequirement extends Component
{
    public $name, $status, $area_requirement_id;

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

    public function create()
    {
        $this->validate();
        try {
            $areaRequirement = new ModelsAreaRequirement();
            $areaRequirement->name = $this->name;
            $areaRequirement->status = 1;
            $areaRequirement->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddAreaRequirementModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($areaRequirement)
    {
        $this->area_requirement_id = $areaRequirement['id'];
        $this->name = $areaRequirement['name'];
        $this->status = $areaRequirement['status'];

        $this->dispatchBrowserEvent('showEditAreaRequirementModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $areaRequirement = ModelsAreaRequirement::find($this->area_requirement_id);
            $areaRequirement->name = $this->name;
            $areaRequirement->status = $this->status;
            $areaRequirement->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditAreaRequirementModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditAreaRequirementModal');
       }
    }

    public function delete($areaRequirement)
    {
        $this->area_requirement_id = $areaRequirement['id'];
        $this->name = $areaRequirement['name'];

        $this->dispatchBrowserEvent('showDeleteAreaRequirementModal');
    }

    public function destroy()
    {
        try {
            $areaRequirement = ModelsAreaRequirement::find($this->area_requirement_id);
            $areaRequirement->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteStateModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteStateModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.area-requirement.area-requirement',[
            'areaRequirements' => ModelsAreaRequirement::where($this->search_input, 'like', '%'.$this->search.'%')
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
