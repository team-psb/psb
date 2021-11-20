<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pass extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'academy_year_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academy()
    {
        return $this->belongsTo(AcademyYear::class);
    }

}
