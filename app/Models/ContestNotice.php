<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestNotice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'contest_category_id',
        'contest_setting_id',
    ];

    public function contestCategory(){
        return $this->belongsTo(ContestCategory::class, 'contest_category_id', 'id');
    }

    public function contestSetting(){
        return $this->belongsTo(ContestSetting::class, 'contest_setting_id', 'id');
    }

    public function contestAreas(){
        return $this->hasMany(ContestArea::class, 'contest_notice_id', 'id');
    }

    public function forms(){
        return $this->hasOneThrough(Form::class, ContestArea::class);
    }
}
