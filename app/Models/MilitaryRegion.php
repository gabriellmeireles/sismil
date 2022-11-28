<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'status',
    ];


    public function militaryCommand()
    {
        return $this->belongsTo(MilitaryCommand::class,'military_command_id','id');
    }

    public function militaryOrganization()
    {
        return $this->hasMany(MilitaryOrganization::class,'military_organization_id', 'id');
    }
}
