<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected   $fillable = [
        'user_id', 'academy_year_id', 'score_question_iq', 'score_question_personal', 'status' 
    ];

    public function user()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function academy_year()
    {
        return $this->belongsTo(AcademyYear::class,'academy_year_id', 'id');
    }
}
