<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndonesiaProvince extends Model
{
    use HasFactory;

    protected $table = 'indonesia_provinces';
    
    public function biodataTwo()
    {
        return $this->hasMany(BiodataTwo::class,' id');
    }
}
