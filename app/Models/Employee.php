<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_ru',
        'position_en',
        'position_tm',
        'name_ru',
        'name_en',
        'name_tm',
        'photo',
    ];
}
