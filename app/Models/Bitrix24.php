<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitrix24 extends Model
{
    /**
     * Поля, доступные для массового заполнения.
     *
     * @var array
     */
    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tm',
        'description_ru',
        'description_en',
        'description_tm',
        'photos',
    ];

    /**
     * Кастинг полей.
     *
     * @var array
     */
    protected $casts = [
        'photos' => 'array', // Преобразование JSON в массив и обратно
    ];
}
