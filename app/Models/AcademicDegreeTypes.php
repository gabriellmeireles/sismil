<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicDegreeTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'score',
        'status',
    ];

    public function academicDegrees()
    {
        return $this->hasMany(AcademicDegrees::class, 'academic_degree_id', 'id');
    }

}
