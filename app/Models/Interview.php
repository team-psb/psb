<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'passes';

    protected $fillable = [
        'user_id', 'stage_id', 'academy_year_id', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id', 'id');
    }

    public function academy_year()
    {
        return $this->belongsTo(AcademyYear::class , 'academy_year_id', 'id');
    }
}
