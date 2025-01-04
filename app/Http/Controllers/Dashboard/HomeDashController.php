<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\HomeDash;
use App\Models\Service; 
use App\Models\AboutUsHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeDashController extends Controller
{
    public function index()
    {
        $slides = HomeDash::all();
        $services = Service::all();
        $aboutUs = AboutUsHome::getAboutUs(); // Получаем данные "О нас"

        return view('dashboard.home', compact('slides', 'services', 'aboutUs'));
    }
    

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title_ru' => 'required|string|max:30',
        'title_en' => 'nullable|string|max:30',
        'title_tm' => 'nullable|string|max:30',
        'description_ru' => 'nullable|string|max:200',
        'description_en' => 'nullable|string|max:200',
        'description_tm' => 'nullable|string|max:200',
        'image' => 'nullable|image|max:5000',
    ]);

    $newSlide = new HomeDash();
    $newSlide->fill($validatedData);

    if ($request->hasFile('image')) {
        $newSlide->image_path = $request->file('image')->store('images', 'public');
    }

    $newSlide->save();

    return redirect()->route('home-dash.index')->with('success', 'Запись успешно добавлена!');
}


    public function showService($id)
    {
        $service = Service::findOrFail($id);
        $categories = $service->categories; // Поле уже массив, не нужно использовать json_decode()
    
        return view('services.show', compact('service', 'categories'));
    }
    

    public function update(Request $request, $id)
    {
        $slide = HomeDash::findOrFail($id);
    
        $validated = $request->validate([
            'title_ru' => 'required|string|max:30',
            'title_en' => 'nullable|string|max:30',
            'title_tm' => 'nullable|string|max:30',
            'description_ru' => 'nullable|string|max:200',
            'description_en' => 'nullable|string|max:200',
            'description_tm' => 'nullable|string|max:200',
            'image' => 'nullable|image|max:5000',
        ]);
    
        $slide->fill($validated);
    
        if ($request->hasFile('image')) {
            if ($slide->image_path && \Storage::exists('public/' . $slide->image_path)) {
                \Storage::delete('public/' . $slide->image_path);
            }
            $slide->image_path = $request->file('image')->store('images', 'public');
        }
    
        $slide->save();
    
        return redirect()->route('home-dash.index')->with('success', 'Запись успешно обновлена!');
    }
    

    public function destroy($id)
    {
        $form = HomeDash::findOrFail($id);

        if ($form->image_path && \Storage::exists('public/' . $form->image_path)) {
            \Storage::delete('public/' . $form->image_path);
        }

        $form->delete();

        return redirect()->route('home-dash.index')->with('success', 'Запись успешно удалена!');
    }

    // Методы для работы с таблицей "Наши услуги"
    public function storeService(Request $request)
    {
        $validatedData = $request->validate([
            // Мультиязычные названия
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_tm' => 'nullable|string|max:255',

            // Мультиязычные категории
            'categories_ru' => 'nullable|array',
            'categories_ru.*' => 'nullable|string|max:255',

            'categories_en' => 'nullable|array',
            'categories_en.*' => 'nullable|string|max:255',

            'categories_tm' => 'nullable|array',
            'categories_tm.*' => 'nullable|string|max:255',
        ]);

        $service = new Service();
        $service->title_ru = $validatedData['title_ru'];
        $service->title_en = $validatedData['title_en'] ?? null;
        $service->title_tm = $validatedData['title_tm'] ?? null;
        $service->list = $request->input('list'); // Если поле 'list' используется

        $service->categories_ru = $validatedData['categories_ru'] ?? [];
        $service->categories_en = $validatedData['categories_en'] ?? [];
        $service->categories_tm = $validatedData['categories_tm'] ?? [];

        $service->save();

        return redirect()->route('home-dash.index')->with('success', 'Услуга успешно добавлена!');
    }

    


public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validatedData = $request->validate([
            // Мультиязычные названия
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_tm' => 'nullable|string|max:255',

            // Мультиязычные категории
            'categories_ru' => 'nullable|array',
            'categories_ru.*' => 'nullable|string|max:255',

            'categories_en' => 'nullable|array',
            'categories_en.*' => 'nullable|string|max:255',

            'categories_tm' => 'nullable|array',
            'categories_tm.*' => 'nullable|string|max:255',
        ]);

        $service->title_ru = $validatedData['title_ru'];
        $service->title_en = $validatedData['title_en'] ?? null;
        $service->title_tm = $validatedData['title_tm'] ?? null;
        $service->list = $request->input('list'); // Если поле 'list' используется

        $service->categories_ru = $validatedData['categories_ru'] ?? [];
        $service->categories_en = $validatedData['categories_en'] ?? [];
        $service->categories_tm = $validatedData['categories_tm'] ?? [];

        $service->save();

        return redirect()->route('home-dash.index')->with('success', 'Услуга успешно обновлена!');
    }

    /**
     * Удаление услуги.
     */
    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('home-dash.index')->with('success', 'Услуга успешно удалена!');
    }



    // ----------------------------------------------------
    public function storeAboutUs(Request $request)
    {
        $validatedData = $request->validate([
            // Валидация названий на разных языках
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_tm' => 'nullable|string|max:255',

            // Валидация описаний на разных языках
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_tm' => 'nullable|string',

            // Валидация изображения
            'image' => 'nullable|image|max:5000', // Максимальный размер 5MB
        ]);

        $aboutUs = new AboutUsHome();
        $aboutUs->title_ru = $validatedData['title_ru'];
        $aboutUs->title_en = $validatedData['title_en'] ?? null;
        $aboutUs->title_tm = $validatedData['title_tm'] ?? null;

        $aboutUs->description_ru = $validatedData['description_ru'] ?? null;
        $aboutUs->description_en = $validatedData['description_en'] ?? null;
        $aboutUs->description_tm = $validatedData['description_tm'] ?? null;

        if ($request->hasFile('image')) {
            $aboutUs->image_path = $request->file('image')->store('about_us', 'public');
        }

        $aboutUs->save();

        return redirect()->route('home-dash.index')->with('success', 'Информация успешно добавлена!');
    }

    /**
     * Обновление информации "О нас" на трёх языках.
     */
    public function updateAboutUs(Request $request, $id)
    {
        $aboutUs = AboutUsHome::findOrFail($id);

        $validatedData = $request->validate([
            // Валидация названий на разных языках
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_tm' => 'nullable|string|max:255',

            // Валидация описаний на разных языках
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_tm' => 'nullable|string',

            // Валидация изображения
            'image' => 'nullable|image|max:5000', // Максимальный размер 5MB
        ]);

        $aboutUs->title_ru = $validatedData['title_ru'];
        $aboutUs->title_en = $validatedData['title_en'] ?? null;
        $aboutUs->title_tm = $validatedData['title_tm'] ?? null;

        $aboutUs->description_ru = $validatedData['description_ru'] ?? null;
        $aboutUs->description_en = $validatedData['description_en'] ?? null;
        $aboutUs->description_tm = $validatedData['description_tm'] ?? null;

        if ($request->hasFile('image')) {
            // Удаление старого изображения, если оно существует
            if ($aboutUs->image_path && AboutUsHome::disk('public')->exists($aboutUs->image_path)) {
                AboutUsHome::disk('public')->delete($aboutUs->image_path);
            }
            $aboutUs->image_path = $request->file('image')->store('about_us', 'public');
        }

        $aboutUs->save();

        return redirect()->route('home-dash.index')->with('success', 'Информация успешно обновлена!');
    }

    /**
     * Удаление информации "О нас".
     */
    public function destroyAboutUs($id)
    {
        $aboutUs = AboutUsHome::findOrFail($id);

        if ($aboutUs->image_path && AboutUsHome::disk('public')->exists($aboutUs->image_path)) {
            AboutUsHome::disk('public')->delete($aboutUs->image_path);
        }

        $aboutUs->delete();

        return redirect()->route('home-dash.index')->with('success', 'Информация успешно удалена!');
    }
   }

