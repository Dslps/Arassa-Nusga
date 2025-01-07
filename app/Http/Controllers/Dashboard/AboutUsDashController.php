<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Principle;
use Illuminate\Support\Facades\Storage;

class AboutUsDashController extends Controller
{
    /**
     * Отображение страницы "О нас" и "Принципы работы"
     */
    public function index()
    {
        // Получение всех записей принципов
        $principles = Principle::all();

        // Получение данных "О нас" или создание новой записи, если её нет
        $aboutUs = AboutUs::first() ?? new AboutUs();

        return view('dashboard.about-us', compact('principles', 'aboutUs'));
    }

    /**
     * Сохранение данных "О нас"
     */
    public function store(Request $request)
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();

        // Сохранение фото
        if ($request->hasFile('photos')) {
            $photosPaths = [];
            foreach ($request->file('photos') as $file) {
                $path = $file->store('about_us_photos', 'public');
                $photosPaths[] = $path;
            }
            $aboutUs->photos = implode(',', $photosPaths);
        }

        // Обновление текстовых полей
        $fields = [
            'title_ru', 'title_en', 'title_tm',
            'description_ru', 'description_en', 'description_tm',
            'additional_ru', 'additional_en', 'additional_tm',
        ];

        foreach ($fields as $field) {
            if ($request->filled($field)) {
                $aboutUs->$field = $request->input($field);
            }
        }

        $aboutUs->save();

        return redirect()->back()->with('success', 'Данные успешно обновлены!');
    }

    /**
     * Создание нового принципа работы
     */
    public function principlesStore(Request $request)
    {
        $validated = $request->validate([
            'title_ru' => 'required|string|max:30',
            'description_ru' => 'required|string|max:200',
            'title_en' => 'nullable|string|max:30',
            'description_en' => 'nullable|string|max:200',
            'title_tm' => 'nullable|string|max:30',
            'description_tm' => 'nullable|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Сохранение изображения
        if ($request->hasFile('image')) {
            $validated['photos'] = $request->file('image')->store('principles', 'public');
        }

        Principle::create($validated);

        return redirect()->back()->with('success', 'Принцип успешно добавлен!');
    }

    /**
     * Обновление принципа работы
     */
    public function principlesUpdate(Request $request, $id)
    {
        $principle = Principle::findOrFail($id);

        $validated = $request->validate([
            'title_ru' => 'required|string|max:30',
            'description_ru' => 'required|string|max:200',
            'title_en' => 'nullable|string|max:30',
            'description_en' => 'nullable|string|max:200',
            'title_tm' => 'nullable|string|max:30',
            'description_tm' => 'nullable|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Обновление изображения
        if ($request->hasFile('image')) {
            if ($principle->photos) {
                Storage::disk('public')->delete($principle->photos);
            }
            $validated['photos'] = $request->file('image')->store('principles', 'public');
        }

        $principle->update($validated);

        return redirect()->back()->with('success', 'Принцип успешно обновлён!');
    }

    /**
     * Удаление принципа работы
     */
    public function principlesDestroy($id)
    {
        $principle = Principle::findOrFail($id);

        if ($principle->photos) {
            Storage::disk('public')->delete($principle->photos);
        }

        $principle->delete();

        return redirect()->back()->with('success', 'Принцип успешно удалён!');
    }
}
