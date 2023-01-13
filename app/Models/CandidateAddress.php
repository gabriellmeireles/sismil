<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'district',
        'city',
        'state',
        'zip_code',
        'candidate_id',
    ];

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'candidate_address_id', 'id');
    }
}
