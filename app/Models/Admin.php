<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'war_name',
        'rank_dregree_id',
        'combat_arm_id',
        'section',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function rankDegree(){
        return $this->belongsTo(rankDegree::class,'rank_degree_id','id');
    }

    public function combatArm(){
        return $this->belongsTo(combatArm::class,'combat_arm_id','id');
    }

    public function section(){
        return $this->belongsTo(section::class,'section_id','id');
    }
}
