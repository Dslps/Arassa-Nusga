<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDescription extends Model
{
    use HasFactory;

    /**
     * Массово заполняемые поля.
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
}
