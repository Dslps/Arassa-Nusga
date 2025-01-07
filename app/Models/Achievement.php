<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'top_text_ru',
        'top_text_en',
        'top_text_tm',
        'title_ru',
        'title_en',
        'title_tm',
        'description_ru',
        'description_en',
        'description_tm',
    ];
}
