<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionIq extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'question_iqs';
    protected   $fillable = [
        'question',
        'image',
        'a',
        'b',
        'c',
        'd',
        'e',
        'answer_key'
    ];
}
