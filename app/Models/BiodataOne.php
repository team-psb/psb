<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiodataOne extends Model
{
    use HasFactory;
    // use SoftDeletes;

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
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function academy()
    {
        return $this->belongsTo(AcademyYear::class);
    }

    
}
