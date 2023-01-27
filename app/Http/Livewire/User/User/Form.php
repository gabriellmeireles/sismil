<?php

namespace App\Http\Livewire\User\User;

use App\Models\CombatArm;
use App\Models\ContestArea;
use App\Models\RankDegree;
use Livewire\Component;

class Form extends Component
{
    public $showPunishmentLevel = false;
    public $contest_notice_id, $candidate_id, $contest_area_id;
    public $punishment, $punishment_level, $combat_arm, $last_rank_degree, $military_organization, $course_score, $graduation_class;
    public $year_service_time, $month_service_time, $day_service_time;


    public function getContestNoticeId($contest){
        dd($contest);
    }

    public function render()
    {
        return view('livewire.user.user.form',[
            'combatArms' => CombatArm::get(),
            'rankDegrees' => RankDegree::get(),
            'contestAreas' => ContestArea::get(),
        ]);
    }
}
