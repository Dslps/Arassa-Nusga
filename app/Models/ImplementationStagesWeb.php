<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImplementationStagesWeb extends Model
{
    protected $table = 'implementation_stages_webs';

    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tm',
        'categories_ru',
        'categories_en',
        'categories_tm',
    ];

    protected $casts = [
        'categories_ru' => 'array',
        'categories_en' => 'array',
        'categories_tm' => 'array',
    ];
}
