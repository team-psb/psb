<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademyYear extends Model
{
    use HasFactory;

    protected $table = 'academy_years';
    protected $fillable = [
        'year', 'is_active', 'stage_id'
    ];
}
