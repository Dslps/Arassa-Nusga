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
            'title' => 'required|string|max:255',
            'categories' => 'nullable|array', 
            'categories.*' => 'nullable|string|max:255',
        ]);
    
        $service = new Service();
        $service->title = $validatedData['title'];
        $service->categories = $validatedData['categories'] ?? []; 
        $service->save();
    
        return redirect()->route('home-dash.index')->with('success', 'Услуга успешно добавлена!');
    }
    


public function updateService(Request $request, $id)
{
    $service = Service::findOrFail($id);

    $validatedData = $request->validate([
        'title' => 'required|string|max:40',
        'categories' => 'nullable|array', // Указываем массив
        'categories.*' => 'nullable|string|max:40', // Проверяем каждую категорию
    ]);

    $service->title = $validatedData['title'];
    $service->categories = $validatedData['categories'] ?? []; // Обновляем массив категорий
    $service->save();

    return redirect()->route('home-dash.index')->with('success', 'Услуга успешно обновлена!');
}


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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5000',
        ]);

        $aboutUs = new AboutUsHome();
        $aboutUs->title = $validatedData['title'];
        $aboutUs->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $aboutUs->image_path = $request->file('image')->store('about_us', 'public');
        }

        $aboutUs->save();

        return redirect()->route('home-dash.index')->with('success', 'Информация успешно добавлена!');
    }

    public function updateAboutUs(Request $request, $id)
    {
        $aboutUs = AboutUsHome::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5000',
        ]);

        $aboutUs->title = $validatedData['title'];
        $aboutUs->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            if ($aboutUs->image_path && \Storage::exists('public/' . $aboutUs->image_path)) {
                \Storage::delete('public/' . $aboutUs->image_path);
            }
            $aboutUs->image_path = $request->file('image')->store('about_us', 'public');
        }

        $aboutUs->save();

        return redirect()->route('home-dash.index')->with('success', 'Информация успешно обновлена!');
    }

    public function destroyAboutUs($id)
    {
        $aboutUs = AboutUsHome::findOrFail($id);

        if ($aboutUs->image_path && \Storage::exists('public/' . $aboutUs->image_path)) {
            \Storage::delete('public/' . $aboutUs->image_path);
        }

        $aboutUs->delete();

        return redirect()->route('home-dash.index')->with('success', 'Информация успешно удалена!');
    }
   }

