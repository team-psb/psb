<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected   $fillable = [
        'user_id', 'academy_year_id', 'url', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academy_year()
    {
        return $this->belongsTo(AcademyYear::class, 'academy_year_id', 'id');
    }
}
