<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function candidates(){
        return $this->hasMany(Candidate::class, 'candidate_type_id', 'id');
    }
}
