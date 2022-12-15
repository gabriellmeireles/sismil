<?php

namespace App\Http\Livewire\Admin\ContestArea;

use App\Models\ContestArea as ModelsContestArea;
use Livewire\Component;
use Livewire\WithPagination;

class ContestArea extends Component
{
    public $name, $status, $city_id, $contest_notice_id;
    public $contest_area_id, $area_requirement_id;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $per_page = 10;
    public $search_input = 'contest_areas.name';

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
        'city_id' => 'required',
        'contest_notice_id' => 'required',
        'contest_area_id' => 'required',
        'area_requirement_id' => 'required',
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
        $this->name = $this->status = $this->city_id = $this->contest_notice_id = null;
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
            $contestArea->save();
            $contestArea->areaRequirements()->attach($this->area_requirement_id);

            $areaRequirement_contest_area = new

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
            'contestAreas' => ModelsContestArea::select("cc.full_name AS category_name",
                                                    "cn.name AS notice_name",
                                                    "c.full_name AS city_name",
                                                    "contest_areas.name AS area_name",
                                                    "contest_areas.status",
                                                    "arca.area_requirement_id",
                                                    "arca.contest_area_id",
                                                    "ar.name AS requirement_name")
                                            ->join("contest_notices AS cn", 'cn.id', 'contest_areas.contest_notice_id')
                                            ->join("contest_categories AS cc", 'cc.id', 'cn.contest_category_id')
                                            ->join("cities AS c", 'c.id', 'contest_areas.city_id')
                                            ->join("area_requirement_contest_area AS arca", 'arca.contest_area_id', 'contest_areas.id')
                                            ->join("area_requirements AS ar", 'ar.id', 'arca.area_requirement_id')
                                            ->where($this->search_input, 'like', '%'.$this->search.'%')
                                            ->orderBy('contest_areas.id')
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
