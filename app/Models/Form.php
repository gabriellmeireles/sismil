<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'combar_arm',
        'military_organization',
        'course_score',
        'graduation_class',
        'year_service_time',
        'month_service_time',
        'day_service_time',
        'last_rank_degree',
        'punishment',
        'punishment_level',
        'candidate_id',
        'contest_area_id',
    ];

    public function contestArea(){
        return $this->belongsTo(ContestArea::class, 'contest_area_id', 'id');
    }

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }

    public function contestNotice(){
        return $this->belongsTo(ContestNotice::class);
    }

}
