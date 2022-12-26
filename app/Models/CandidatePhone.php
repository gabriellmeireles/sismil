<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePhone extends Model
{
    use HasFactory;

    protected $fillable = [
        'ddd',
        'number',
        'candidate_id',
    ];

    public function candidates()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
