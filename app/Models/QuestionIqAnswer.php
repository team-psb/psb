<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionIqAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_iq_id',
        'answer'
    ];

    public function questionIq()
    {
        return $this->belongsTo(QuestionIq::class, 'question_iq_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
