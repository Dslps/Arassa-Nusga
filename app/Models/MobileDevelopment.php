<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileDevelopment extends Model
{
    protected $table = 'mobile_developments';

    protected $fillable = [
        'title_ru',
        'title_en',
        'title_tm',
        'categories_ru',
        'categories_en',
        'categories_tm',
    ];

    protected $casts = [
        'categories_ru' => 'array',
        'categories_en' => 'array',
        'categories_tm' => 'array',
    ];

    // Аксессоры для гарантии строковых значений
    public function getTitleRuAttribute($value)
    {
        return is_array($value) ? json_encode($value) : $value;
    }

    public function getTitleEnAttribute($value)
    {
        return is_array($value) ? json_encode($value) : $value;
    }

    public function getTitleTmAttribute($value)
    {
        return is_array($value) ? json_encode($value) : $value;
    }
}
