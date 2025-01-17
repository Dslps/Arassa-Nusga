<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsHome extends Model
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

    public static function getAboutUs()
    {
        return self::first() ?? new self([
            'title_ru' => 'Заголовок по умолчанию',
            'title_en' => 'Default Title',
            'title_tm' => 'Adalgydan Başlyk',
            'description_ru' => 'Описание по умолчанию',
            'description_en' => 'Default Description',
            'description_tm' => 'Adalgydan Açyk',
            'image_path' => 'img/home-page/building.png',
        ]);
    }
}
