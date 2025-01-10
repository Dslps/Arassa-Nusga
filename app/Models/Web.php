<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $table = 'webs';
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
