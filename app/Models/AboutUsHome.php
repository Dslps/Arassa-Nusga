<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsHome extends Model
{
    protected $table = 'about_us_homes';

    // Поля, которые можно массово заполнять
    protected $fillable = [
        'title',         // Название
        'description',   // Описание
        'image_path',    // Путь к изображению
    ];

}
