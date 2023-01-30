<?php

namespace App\Http\Livewire\User\Form;

use App\Models\Candidate;
use App\Models\City;
use App\Models\ContestArea;
use App\Models\ContestNotice;
use App\Models\Form as ModelsForm;
use App\Models\RankDegree;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Form extends Component
{
    public $showPunishmentLevel = false;
    public $candidate_id, $contest_notice_id, $city, $contest_area;
    public $last_rank_degrees, $cities;
    public $punishment, $punishment_level, $last_rank_degree, $military_organization, $course_score, $graduation_class;
    public $academic_degree_name, $academic_institution_name, $academic_institution_city, $academic_graduation_date;
    public $year_service_time, $month_service_time, $day_service_time;

    public function index()
    {
        $notice = ContestNotice::find($this->contest_notice_id);
        if ($notice->forms) {
            redirect()->route('user.dashboard');
        }
    }

    public function mount()
    {

        $this->candidate_id = Candidate::where('user_id',auth()->user()->id)->first()->id;
        $this->cities = City::all()->where('status', 1);
        $this->last_rank_degrees = RankDegree::all()->where('status', 1)->where('id','!=',0);


    }

    public function render()
    {
        return view('livewire.user.form.eipot-registration-form',[
            'contestAreas' => ContestArea::all()->where('status',1)->where('contest_notice_id', $this->contest_notice_id)->where('city_id', $this->city)
        ]);
    }

    public function showEventMessage($message, $type)
    {
        return $this->dispatchBrowserEvent('showEventMessage',[
            'message' => $message,
            'type' => $type,
        ]);
    }

    protected $rules = [
        'city' => 'required',
        'contest_area' => 'required',
        'last_rank_degree' => 'required',
        'military_organization' => 'required',
        'course_score' => 'required',
        'graduation_class' => 'required',
        'year_service_time' => 'required',
        'month_service_time' => 'required',
        'day_service_time' => 'required',
        'punishment' => 'required',
        'punishment_level'=> 'required_if:punishment,1',
        'academic_degree_name' => 'required',
        'academic_institution_name' => 'required',
        'academic_institution_city' => 'required',
        'academic_graduation_date' => 'required',

    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store(){
        $this->validate();

        DB::beginTransaction();
            try {
                $form = ModelsForm::updateOrCreate(
                    ['candidate_id' => $this->candidate_id, 'contest_area_id' => $this->contest_area,],
                    [
                        'city' => $this->city,
                        'last_rank_degree' => $this->last_rank_degree,
                        'military_organization' => $this->military_organization,
                        'course_score' => $this->course_score,
                        'graduation_class' => $this->graduation_class,
                        'year_service_time' => $this->year_service_time,
                        'month_service_time' => $this->month_service_time,
                        'day_service_time' => $this->day_service_time,
                        'punishment' => $this->punishment,
                        'punishment_level'=> $this->punishment_level,
                    ]
                );
               /*  AcademicDegree::updateOrCreate(
                    ['form_id' => $form->id],
                    [
                        'academic_degree_name' => $this->academic_degree_name,
                        'academic_institution_name' => $this->academic_institution_name,
                        'academic_institution_city' => $this->academic_institution_city,
                        'academic_graduation_date' => $this->academic_graduation_date,
                    ]
                ); */
                DB::commit();
                session()->flash('status','Inscrição realizada com sucesso.');
                return redirect()->route('user.dashboard');
        } catch (\Illuminate\Database\QueryException $eQuery) {
            $this->showEventMessage('Não foi possível realizar a Inscrição. <br><strong>Exceção no Banco de Dados</strong>!', 'error');
        }
    }
}
