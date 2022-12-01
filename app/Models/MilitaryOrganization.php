<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'status',
        'military_region_id'
    ];


    public function militaryRegion()
    {
        return $this->belongsTo(MilitaryRegion::class,'military_region_id','id');
    }
}
