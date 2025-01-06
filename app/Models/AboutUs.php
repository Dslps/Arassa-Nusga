<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'photos',
        'title_ru',
        'title_en',
        'title_tm',
        'description_ru',
        'description_en',
        'description_tm',
        'additional_ru',
        'additional_en',
        'additional_tm',
    ];

    // Если используешь JSON для фото, можно автоматически приводить к массиву
    protected $casts = [
        'photos' => 'array',
    ];
}
