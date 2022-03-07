<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiodataOne extends Model
{
    // use HasFactory, SoftDeletes;
    use HasFactory;

    protected $table = 'biodata_ones';
    protected $fillable = [
        'user_id',
        'academy_year_id',
        'family',
        'full_name',
        'age',
        'birth_date',
        'no_wa',
        'gender',
        'stage_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function academy_year()
    {
        return $this->belongsTo(AcademyYear::class, 'academy_year_id', 'id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id');
    }

    public function biodataTwo()
    {
        return $this->hasMany(BiodataTwo::class, 'user_id', 'user_id');
    }
}