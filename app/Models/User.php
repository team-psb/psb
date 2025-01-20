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
    // use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

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
        'token',
        'confirm_token',
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
        return $this->hasMany(BiodataOne::class, 'user_id');
    }

    public function biodataTwo()
    {
        return $this->hasMany(BiodataTwo::class, 'user_id');
    }

    public function score()
    {
        return $this->hasMany(Score::class, 'user_id');
    }

    public function scoreIq()
    {
        return $this->hasMany(ScoreIq::class, 'user_id');
    }

    public function scorePersonal()
    {
        return $this->hasMany(ScorePersonal::class, 'user_id');
    }

    public function video()
    {
        return $this->hasMany(Video::class, 'user_id');
    }

    public function pass()
    {
        return $this->hasMany(Pass::class, 'user_id');
    }

}