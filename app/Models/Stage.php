<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected   $fillable = [
        'name'
    ];

    public function academy_year()
    {
        return $this->hasMany(AcademyYear::class, 'stage_id', 'id');
    }

}
