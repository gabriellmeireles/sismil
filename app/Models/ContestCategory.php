<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'status',
    ];

    public function contestNotices(){
        return $this->hasMany(ContestNotices::class, 'contest_category_id', 'id');
    }
}
