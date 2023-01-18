<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity',
        'issuing_agency',
        'gender',
        'photo',
        'birth_date',
        'marital_status',
        'dependent_number',
        'nationality',
        'naturalness',
        'mother_name',
        'father_name',
        'height',
        'weight',
        'candidate_type_id',
        'candidate_addres_id',
        'user_id',
    ];

    public function candidatePhone()
    {
        return $this->hasOne(CandidatePhone::class, 'candidate_id', 'id');
    }

    public function candidateType()
    {
        return $this->belongsTo(CandidateType::class, 'candidate_type_id', 'id');
    }

    public function candidateAddress()
    {
        return $this->hasOne(CandidateAddress::class, 'candidate_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
