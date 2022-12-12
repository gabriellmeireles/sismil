<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function contestAreas()
    {
        return $this->belongsToMany(ContestArea::class);
    }
}
