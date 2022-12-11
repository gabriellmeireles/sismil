<?php

namespace App\Http\Livewire\Admin\ContestArea;

use App\Models\ContestArea as ModelsContestArea;
use App\Models\ContestAreaRequirement as ModelsContestAreaRequirement;
use Livewire\Component;
use Livewire\WithPagination;

class ContestArea extends Component
{
    public $name, $status, $city_id, $contest_notice_id;
    public $contest_area_id, $contest_area_requirement_type_id;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'cities.full_name';

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
        'city_id' => 'required',
        'contest_notice_id' => 'required',
        'status' => 'required',
        'contest_area_id' => 'required',
        'contest_area_requirement_type_id' => 'required',
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
        $this->full_name = $this->status = null;
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        try {
            $contestArea = new ModelsContestArea();
            $contestArea->name = $this->name;
            $contestArea->status = 1;
            $contestArea->city_id = $this->city_id;
            $contestArea->contest_notice_id = $this->contest_notice_id;

            $contestAreaId = $contestArea->id;

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddContestAreaModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($contestArea)
    {
        $this->city_id = $contestArea['id'];
        $this->name = $contestArea['name'];
        $this->status = $contestArea['status'];
        $this->contest_notice_id = $contestArea['contest_notice_id'];
        $this->contest_area_id = $contestArea['contest_area_id'];
        $this->contest_area_requirement_type_id = $contestArea['contest_area_requirement_type_id'];

        $this->dispatchBrowserEvent('showEditContestAreaModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $contestArea = ModelsContestArea::find($this->contest_area_id);
            $contestArea->full_name = $this->full_name;
            $contestArea->status = $this->status;
            $contestArea->state_id = $this->state;
            $contestArea->save();

            $this->showEventMessage('Alteração realizada com sucesso.','success');
            $this->dispatchBrowserEvent('hideEditContestAreaModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a alteração. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
            $this->dispatchBrowserEvent('hideEditContestAreaModal');
       }
    }

    public function delete($city)
    {
        $this->city_id = $city['id'];
        $this->full_name = $city['full_name'];

        $this->dispatchBrowserEvent('showDeleteCityModal');
    }

    public function destroy()
    {
        try {
            $city = ModelsContestArea::find($this->city_id);
            $city->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeleteCityModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeleteCityModal');
        }
    }

    public function render()
    {
        return view('livewire.admin.contest-area.contest-area',[
            $contestAreas = ModelsContestArea::all()
                                                ->where($this->search_input, 'like', '%'.$this->search.'%')
                                                ->orderBy('contest_notices.id')
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
