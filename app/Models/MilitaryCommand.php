<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryCommand extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'status',
    ];


    public function militaryRegion()
    {
        return $this->hasMany(MilitaryRegion::class,'military_command_id', 'id');
    }
}
