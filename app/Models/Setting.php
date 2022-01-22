<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'academy_year_id', 
        'stage_id', 
        'question_iq_value', 
        'question_personal_value', 
        'announcement', 
        'no_msg',
        'notification', 
        'notif_tahap1',
        'notif_tahap1_failed',
        'notif_tahap2',
        'notif_tahap2_failed',
        'notif_tahap3',
        'notif_tahap3_failed',
        'notif_tahap4',
        'notif_tahap4_failed',
        'notif_tahap5',
        'notif_tahap5_passed',
        'notif_tahap5_failed',
    ];
}
