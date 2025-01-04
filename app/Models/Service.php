<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * Поля, которые можно массово заполнять.
     */
    protected $fillable = [
        // Названия
        'title_ru',
        'title_en',
        'title_tm',

        // Если старое поле title ещё используете — добавьте его или удалите
        // 'title',

        // Поле list, если нужно
        'list',

        // Мультиязычные категории
        'categories_ru',
        'categories_en',
        'categories_tm',
    ];

    /**
     * Преобразуем JSON-поля к массивам.
     */
    protected $casts = [
        'categories_ru' => 'array',
        'categories_en' => 'array',
        'categories_tm' => 'array',
    ];
}
