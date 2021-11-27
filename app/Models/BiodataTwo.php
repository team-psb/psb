<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiodataTwo extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected   $fillable = [
        'user_id',
        'academy_year_id',
        'province_id',
        'regency_id',
        'birth_place',
        'address',
        'facebook',
        'instagram',
        'last_education',
        'name_school',
        'major',
        'organization',
        'achievment',
        'hobby',
        'goal',
        'skill',
        'memorization',
        'figure_idol',
        'chaplain_idol',
        'tauhid',
        'study_islamic',
        'read_book',
        'smoker',
        'girlfriend',
        'gamer',
        'game_name',
        'game_duration',
        'reason_registration',
        'activity',
        'personal',
        'parent',
        'father',
        'father_work',
        'mother',
        'mother_work',
        'parent_income',
        'child_to',
        'borther',
        'no_guardian',
        'description_guardian',
        'permission_parent',
        'have_laptop',
        'agree',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academy_year()
    {
        return $this->belongsTo(AcademyYear::class);
    }

}
