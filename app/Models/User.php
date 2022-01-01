<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone',
        'password',
        'role',
        'last_login'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function biodataOne()
    {
        return $this->hasOne(BiodataOne::class, 'user_id');
    }

    public function biodataTwo()
    {
        return $this->hasOne(BiodataTwo::class, 'user_id');
    }

    public function score()
    {
        return $this->hasOne(Score::class, 'user_id');
    }

    public function scoreIq()
    {
        return $this->hasOne(ScoreIq::class, 'user_id');
    }

    public function scorePersonal()
    {
        return $this->hasOne(ScorePersonal::class, 'user_id');
    }

    public function video()
    {
        return $this->hasOne(Video::class, 'user_id');
    }

    public function pass()
    {
        return $this->hasOne(Pass::class, 'user_id');
    }

}
