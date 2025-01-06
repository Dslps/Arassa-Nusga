<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsDashController extends Controller
{
    public function index()
    {
        // Берём одну существующую запись, или создаём пустую, если нет записей
        $aboutUs = AboutUs::first() ?? new AboutUs();

        return view('dashboard.about-us', compact('aboutUs'));
    }

    public function store(Request $request)
    {
        // Точно так же: берём существующую запись, либо создаём новую, 
        // если в таблице ничего нет
        $aboutUs = AboutUs::first() ?? new AboutUs();

        // Если есть файлы, обрабатываем их
        if ($request->hasFile('photos')) {
            $photosPaths = [];
            foreach ($request->file('photos') as $file) {
                $path = $file->store('about_us_photos', 'public');
                $photosPaths[] = $path;
            }
            // В этом примере сохраняем пути к фото в одной строке, разделённой запятыми.
            // Если нужно иное поведение — меняем логику.
            $aboutUs->photos = implode(',', $photosPaths);
        }

        // Поля, которые хотим обновлять (только если не пустые)
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

        // Перебираем эти поля и присваиваем их в модель 
        // только если пришло непустое значение
        foreach ($fields as $field) {
            $value = $request->input($field);
            // Проверяем, что поле заполнено (не null и не пустая строка)
            if (!is_null($value) && $value !== '') {
                $aboutUs->$field = $value;
            }
        }

        $aboutUs->save();

        return redirect()->back()->with('success', 'Данные успешно обновлены!');
    }


}
