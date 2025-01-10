<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplementationStagesMobile extends Model
{
    use HasFactory;

    protected $table = 'implementation_stages_mobiles';

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
