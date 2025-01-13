<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

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

    protected $casts = [
        'photos' => 'array',
    ];
}
