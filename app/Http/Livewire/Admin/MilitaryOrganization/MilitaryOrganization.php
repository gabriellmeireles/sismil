<?php

namespace App\Http\Livewire\Admin\MilitaryOrganization;

use App\Models\MilitaryOrganization as ModelsMilitaryOrganization;
use App\Models\MilitaryRegion;
use Livewire\Component;
use Livewire\WithPagination;

class MilitaryOrganization extends Component
{

    /**
     * Pagination config
     * DataTable config
     */

    public $full_name, $short_name, $status, $military_region;

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
        'military_region' => 'required',
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
        $this->full_name = $this->short_name = $this->status = $this->military_region = null;
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        try {
            $om = new ModelsMilitaryOrganization();
            $om->full_name = $this->full_name;
            $om->short_name = $this->short_name;
            $om->status = 1;
            $om->military_region_id = $this->military_region;
            $om->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddOmModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($om)
    {
        $this->om_id = $om['id'];
        $this->full_name = $om['full_name'];
        $this->short_name = $om['short_name'];
        $this->military_region = $om['military_region_id'];
        $this->status = $om['status'];

        $this->dispatchBrowserEvent('showEditOmModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $om = ModelsMilitaryOrganization::find($this->om_id);
            $om->full_name = $this->full_name;
            $om->short_name = $this->short_name;
            $om->status = $this->status;
            $om->military_region_id = $this->military_region;
            $om->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditOmModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditOmModal');
       }
    }

    public function delete($om)
    {
        $this->om_id = $om['id'];
        $this->full_name = $om['full_name'];

        $this->dispatchBrowserEvent('showDeleteOmModal');
    }

    public function destroy()
    {
        try {
            $om = ModelsMilitaryOrganization::find($this->om_id);
            $om->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteOmModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteOmModal');
        }
    }
    
    public function render()
    {
        return view('livewire.admin.military-organization.military-organization', [
            'oms' => ModelsMilitaryOrganization::where($this->search_input, 'like', '%'.$this->search.'%')
                                        ->orderBy('id')
                                        ->paginate($this->per_page),
            'rms' => MilitaryRegion::where('status', '=', 1)->get(),
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
