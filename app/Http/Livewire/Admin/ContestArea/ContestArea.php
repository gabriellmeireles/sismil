<?php

namespace App\Http\Livewire\Admin\ContestArea;

use App\Models\AreaRequirement;
use App\Models\City;
use App\Models\ContestArea as ModelsContestArea;
use App\Models\ContestCategory;
use App\Models\ContestNotice;
use Livewire\Component;
use Livewire\WithPagination;

class ContestArea extends Component
{
    public $area_id, $name, $status, $city_id, $contest_notice_id, $contest_category_id;
    public $contest_area_id, $area_requirement_id = [];

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
        'city_id' => 'required',
        'contest_notice_id' => 'required',
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
        $this->name = $this->status = $this->city_id = $this->contest_notice_id = $this->area_requirement_id = $this->area_id = null;
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        try {
            $contestArea = new ModelsContestArea();
            $contestArea->name = $this->name;
            $contestArea->status = 1;
            $contestArea->contest_notice_id = $this->contest_notice_id;
            $contestArea->city_id = $this->city_id;
            $contestArea->save();
            $contestArea->areaRequirements()->attach($this->area_requirement_id);

            /* $areaRequirement_contest_area = new */

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddContestAreaModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function edit($contestArea)
    {
        $this->city_id = $contestArea['id'];
        $this->name = $contestArea['area_name'];
        $this->status = $contestArea['status'];
        $this->contest_notice_id = $contestArea['contest_notice_id'];
        $this->contest_area_id = $contestArea['contest_area_id'];
        $this->area_requirement_id = $contestArea['area_requirement_id'];

        $this->dispatchBrowserEvent('showEditContestAreaModal');
    }

    public function update()
    {
        $this->validate();
        try {
            $contestArea = ModelsContestArea::find($this->contest_area_id);
            $contestArea->name = $this->name;
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

    public function deactivate($contestArea)
    {
        $this->area_id = $contestArea['area_id'];
        $this->name = $contestArea['area_name'];

        $this->dispatchBrowserEvent('showDeactivateContestAreaModal');
    }

    public function inactivate()
    {
        try {
            $contestArea = ModelsContestArea::find($this->area_id);
            $contestArea->update([
                'status' => 0,
            ]);

            $this->showEventMessage('Desativação realizada com sucesso', 'success');
            $this->dispatchBrowserEvent('hideDeactivateContestAreaModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Problema ao desativar o usuário <br><strong>Exceção Bando de Dados!<strong>' ,'error');
            $this->dispatchBrowserEvent('hideDeactivateContestAreaModal');
        }
    }

    public function render()
    {

        return view('livewire.admin.contest-area.contest-area',[
            'contestAreas' => ModelsContestArea::select("contest_categories.short_name AS category_name",
                                                    "contest_notices.name AS notice_name",
                                                    "cities.full_name AS city_name",
                                                    "states.short_name AS state_name",
                                                    "contest_areas.id AS area_id",
                                                    "contest_areas.name AS area_name",
                                                    "contest_areas.status",
                                                    "contest_areas.created_at",
                                                    "contest_areas.updated_at",
                                                   /*  "arca.area_requirement_id",
                                                    "arca.contest_area_id",
                                                    "ar.name AS requirement_name" */)
                                            ->join("contest_notices", 'contest_notices.id', 'contest_areas.contest_notice_id')
                                            ->join("contest_categories", 'contest_categories.id', 'contest_notices.contest_category_id')
                                            ->join("cities", 'cities.id', 'contest_areas.city_id')
                                            ->join("states", 'states.id', 'cities.state_id')
                                            /* ->join("area_requirement_contest_area AS arca", 'arca.contest_area_id', 'contest_areas.id')
                                            ->join("area_requirements AS ar", 'ar.id', 'arca.area_requirement_id') */
                                            ->where($this->search_input, 'like', '%'.$this->search.'%')
                                            ->orderBy('contest_areas.id')
                                            ->paginate($this->per_page),
            'contestCategories' => ContestCategory::select('id', 'short_name')->where('status', 1)->get(),
            'contestNotices' => ContestNotice::all()->where('status', 1)->where('contest_category_id', $this->contest_category_id),
            'cities' => City::select('id','full_name')->where('status', 1)->get(),
            'areaRequirements' => AreaRequirement::select('id', 'name')->where('status', 1)->get(),

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
