<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaspersky extends Model
{
    use HasFactory;

    protected $table = 'kasperskies';

    protected $fillable = [
        'id',
        'title_ru',
        'title_en',
        'title_tm',
        'categories_ru',
        'categories_en',
        'categories_tm',
        'discount',
        'price',
    ];

    protected $casts = [
        'categories_ru' => 'array',
        'categories_en' => 'array',
        'categories_tm' => 'array',
    ];


}
