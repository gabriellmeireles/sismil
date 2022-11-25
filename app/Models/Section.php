<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name'        
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function admin(){
        return $this->hasMany(Admin::class);
    }
}
