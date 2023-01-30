<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicDegrees extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'institution_name',
        'institution_city',
        'graduation_date',
        'observation',
        'status',
        'form_id',
        'academic_degree_type_id',
    ];

    public function academicDegreeType()
    {
        return $this->belongsTo(AcademicDegreeTypes::class, 'academic_degree_type_id', 'id');
    }
}
