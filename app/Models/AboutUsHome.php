<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsHome extends Model
{
    protected $fillable = ['title', 'description', 'image_path'];

    // Метод для получения данных
    public static function getAboutUs()
    {
        return self::first() ?? new self([
            'title' => 'Заголовок по умолчанию',
            'description' => 'Описание по умолчанию',
            'image_path' => 'img/home-page/building.png',
        ]);
    }
}

