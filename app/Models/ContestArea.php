<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'city_id',
        'contest_notice_id'
    ] ;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function contestNotice()
    {
        return $this->belongsTo(ContestNotice::class, 'contest_notice_id', 'id');
    }

    public function areaRequirements()
    {
        return $this->belongsToMany(AreaRequirement::class);
    }
}
