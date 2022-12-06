<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'initial_inscription',
        'final_inscription',
        'gru_expiration',
        'min_age',
        'max_age',
        'min_male_height',
        'min_female_height',
        'status'
    ];
}
