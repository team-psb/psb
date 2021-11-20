<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionIq extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected   $fillable = [
        'question',
        'image',
        'a',
        'b',
        'c',
        'd',
        'e',
        'question_key'
    ];
}
