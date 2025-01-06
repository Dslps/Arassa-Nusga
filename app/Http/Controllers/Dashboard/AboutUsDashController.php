<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsDashController extends Controller
{
    public function index()
    {
        // Одна запись или пустая, если ещё ничего нет
        $aboutUs = AboutUs::first() ?? new AboutUs();

        return view('dashboard.about-us', compact('aboutUs'));
    }

    public function store(Request $request)
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();

        // Если у нас есть новые файлы — полностью перезаписываем
        if ($request->hasFile('photos')) {
            $photosPaths = [];
            foreach ($request->file('photos') as $file) {
                // Сохраняем файл в storage/app/public/about_us_photos
                $path = $file->store('about_us_photos', 'public');
                $photosPaths[] = $path;
            }

            // Перезаписываем старые фото (без сохранения прежних)
            $aboutUs->photos = implode(',', $photosPaths);
        } else {
            // Если нужно, чтобы при отсутствии новых файлов старые оставались
            // — ничего здесь не делаем.
            
            // Если же надо очищать поле при отсутствии новых файлов:
            // $aboutUs->photos = null;
        }

        // Обновляем только непустые текстовые поля
        $fields = [
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

        foreach ($fields as $field) {
            $value = $request->input($field);
            if (!is_null($value) && $value !== '') {
                $aboutUs->$field = $value;
            }
        }

        $aboutUs->save();

        return redirect()->back()->with('success', 'Данные успешно обновлены!');
    }
    // ---------------------------------------
    
}
