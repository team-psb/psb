<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPersonalAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_personal_id',
        'answer'
    ];

    public function questionPersonal()
    {
        return $this->belongsTo(QuestionPersonal::class, 'question_personal_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
