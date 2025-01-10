<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antiviruses extends Model
{
    protected $table = 'antiviruses';
    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tm',
        'categories_ru',
        'categories_en',
        'categories_tm',
        'photos',
    ];

    protected $casts = [
        'photos' => 'array', 
    ];
}
