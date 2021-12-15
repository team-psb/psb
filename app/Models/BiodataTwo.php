<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiodataTwo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'biodata_twos';
    protected   $fillable = [
        'user_id',
        'academy_year_id',
        'stage_id',
        'indonesia_cities_id',
        'indonesia_provinces_id',
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
        'brother',
        'no_guardian',
        'description_guardian',
        'permission_parent',
        'have_laptop',
        'agree',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function academy_year()
    {
        return $this->belongsTo(AcademyYear::class, 'academy_year_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(IndonesiaCity::class,'indonesia_cities_id','id');
    }

    public function provincy()
    {
        return $this->belongsTo(IndonesiaProvince::class,'indonesia_provinces_id','code');
    }

}
