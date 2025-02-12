<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitrix24 extends Model
{
    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tm',
        'description_ru',
        'description_en',
        'description_tm',
        'photos',
    ];

    protected $casts = [
        'photos' => 'array', 
    ];
}
