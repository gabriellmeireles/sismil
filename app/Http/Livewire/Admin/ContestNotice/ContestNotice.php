<?php

namespace App\Http\Livewire\Admin\ContestNotice;

use App\Models\ContestCategory as ModelsContestCategory;
use App\Models\ContestNotice as ModelsContestNotice;
use App\Models\ContestSetting as ModelsContestSetting;
use Livewire\Component;
use Livewire\WithPagination;

class ContestNotice extends Component
{
    public $name, $status, $contest_category, $contest_setting;
    public $year, $initial_inscription, $final_inscription, $gru_expiration, $min_age, $max_age, $min_male_height, $min_female_height;

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
        'name' => 'required|string',
        'status' => 'required',
        'contest_category' => 'required',
        'year' => 'required|digits:4',
        'initial_inscription' => 'required|date',
        'final_inscription' => 'required|date',
        'gru_expiration' => 'date',
        'min_age' => 'required|digits:2',
        'max_age' => 'required|digits:2',
        'min_male_height' => 'required|numeric',
        'min_female_height' => 'required|numeric',
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
        $this->name = $this->status = $this->contest_category = $this->contest_setting = null;
        $this->year = $this->initial_inscription = $this->final_inscription = $this->gru_expiration = $this->min_age = $this->max_age = $this->min_male_height = $this->min_female_height = null;
        $this->resetErrorBag();
    }

    public function create()
    {

        $this->validate();
        try {
            $contestSetting = new ModelsContestSetting();
            $contestSetting->year = $this->year;
            $contestSetting->initial_inscription = $this->initial_inscription;
            $contestSetting->final_inscription = $this->final_inscription;
            $contestSetting->gru_expiration = $this->gru_expiration;
            $contestSetting->min_age = $this->min_age;
            $contestSetting->max_age = $this->max_age;
            $contestSetting->min_male_height = $this->min_male_height;
            $contestSetting->min_female_height = $this->min_female_height;
            $contestSetting->save();

            $contestSettingId = $contestSetting->id;

            $contestNotice = new ModelsContestNotice();
            $contestNotice->name = $this->name;
            $contestNotice->status = $this->status;
            $contestNotice->contest_category_id = $this->contest_category;
            $contestNotice->contest_setting_id = $contestSettingId;
            $contestNotice->save();

            $this->showEventMessage('Cadastrado realizado com sucesso.', 'success');
            $this->dispatchBrowserEvent('hideAddContestNoticeModal');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar o cadastrar. <br><strong>Exceção: Banco de Dados</strong>!', 'error');
        }
    }

    public function render()
    {
        return view('livewire.admin.contest-notice.contest-notice',[
            'contestSettings' => ModelsContestSetting::all(),
            'contestCategories' => ModelsContestCategory::all(),
            'contestNotices' => ModelsContestNotice::select('contest_notices.name',
                                                            'contest_notices.status',
                                                            'contest_notices.updated_at',
                                                            'contest_categories.id',
                                                            'contest_categories.short_name',
                                                            'contest_settings.id',
                                                            'contest_settings.year',
                                                            'contest_settings.initial_inscription',
                                                            'contest_settings.final_inscription',
                                                            'contest_settings.gru_expiration',
                                                            'contest_settings.min_age',
                                                            'contest_settings.max_age',
                                                            'contest_settings.min_male_height',
                                                            'contest_settings.min_female_height')
                                                            ->join('contest_categories', 'contest_categories.id','contest_notices.contest_category_id')
                                                            ->join('contest_settings', 'contest_settings.id','contest_notices.contest_setting_id')
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
