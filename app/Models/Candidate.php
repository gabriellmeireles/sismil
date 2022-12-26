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
        'nationality',
        'naturalness',
        'mother_name',
        'father_name',
        'candidate_type_id',
        'candidate_addres_id',
        'user_id',
    ];

    public function candidatePhones()
    {
        return $this->hasMany(CandidatePhone::class, 'candidate_id', 'id');
    }

    public function candidateType()
    {
        return $this->belongsTo(CandidateType::class, 'candidate_type_id', 'id');
    }

    public function candidateAddress()
    {
        return $this->hasOne(CandidateAddress::class, 'candidate_address_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
