<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionPersonal extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected   $fillable = [
        'question', 'a', 'b', 'c', 'd', 'e', 'poin_a', 'poin_b', 'poin_c', 'poin_d', 'poin_e'
    ];

    public function questionPersonalAnswers()
    {
        return $this->hasMany(QuestionPersonalAnswer::class, 'question_personal_id');
    }
}
