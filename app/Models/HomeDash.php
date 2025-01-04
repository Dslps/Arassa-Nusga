<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeDash extends Model
{
    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tm',
        'description_ru',
        'description_en',
        'description_tm',
        'image_path',
    ];
}
