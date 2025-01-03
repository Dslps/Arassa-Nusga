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
            'title' => 'required|string|max:20',
            'description' => 'nullable|string|max:200',
            'image' => 'nullable|image|max:5000',
        ]);

        $newForm = new HomeDash();
        $newForm->title = $validatedData['title'];
        $newForm->description = $validatedData['description'] ?? null;

        if ($request->hasFile('image')) {
            $newForm->image_path = $request->file('image')->store('images', 'public');
        }

        $newForm->save();

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
        $form = HomeDash::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $form->title = $validated['title'];
        $form->description = $validated['description'];

        if ($request->hasFile('image')) {
            if ($form->image_path && \Storage::exists('public/' . $form->image_path)) {
                \Storage::delete('public/' . $form->image_path);
            }
            $form->image_path = $request->file('image')->store('images', 'public');
        }

        $form->save();

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
        $aboutUs->description = $validatedData['description']; // Текст сохраняется как есть.
    
        if ($request->hasFile('image')) {
            if ($aboutUs->image_path && \Storage::exists('public/' . $aboutUs->image_path)) {
                \Storage::delete('public/' . $aboutUs->image_path);
            }
            $aboutUs->image_path = $request->file('image')->store('about_us', 'public');
        }
    
        $aboutUs->save();
    
        return redirect()->route('about-us.index')->with('success', 'Данные успешно обновлены!');
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

