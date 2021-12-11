<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademyYear extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'academy_years';

    protected $fillable = [
        'year', 'is_active', 'stage_id'
    ];

    public function biodataOne()
    {
        return $this->hasMany(Biodata1::class)->withTrashed();
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
