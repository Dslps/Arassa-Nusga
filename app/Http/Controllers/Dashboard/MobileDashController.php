<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Mobile;
use App\Models\MobileDevelopment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MobileDashController extends Controller
{
    public function index(){

        $mobile = Mobile::first() ?? new Mobile();
        $services = MobileDevelopment::all();

        return view('dashboard.service.mobile', compact('mobile', 'services'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title_ru' => 'required|string|max:255',
        'title_en' => 'required|string|max:255',
        'title_tm' => 'required|string|max:255',

        'categories_ru' => 'required|string',
        'categories_en' => 'required|string',
        'categories_tm' => 'required|string',

        'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $mobile = Mobile::first() ?? new Mobile();

    if ($request->hasFile('photos')) {
        if ($mobile->photos && is_array($mobile->photos)) {
            foreach ($mobile->photos as $oldPhoto) {
                if (Storage::disk('public')->exists($oldPhoto)) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }
        }

        $photoPaths = [];
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('photos', 'public');
            $photoPaths[] = $path;
        }

        $mobile->photos = $photoPaths;
    }

    $mobile->title_ru = $validated['title_ru'];
    $mobile->title_en = $validated['title_en'];
    $mobile->title_tm = $validated['title_tm'];
    $mobile->categories_ru = $validated['categories_ru'];
    $mobile->categories_en = $validated['categories_en'];
    $mobile->categories_tm = $validated['categories_tm'];

    $mobile->save();

    return redirect()->back()->with('success', 'Данные успешно сохранены!');
}
// ------------------------------------------------------------------------

public function storeService(Request $request) 
{
    // Валидация данных
    $validatedData = $request->validate([
        'title_ru' => 'required|string|max:40',
        'title_en' => 'nullable|string|max:40',
        'title_tm' => 'nullable|string|max:40',
        'categories_ru' => 'nullable|array',
        'categories_en' => 'nullable|array',
        'categories_tm' => 'nullable|array',
    ]);

    // Дополнительные проверки
    foreach (['title_ru', 'title_en', 'title_tm'] as $field) {
        if (is_array($validatedData[$field] ?? null)) {
            $validatedData[$field] = json_encode($validatedData[$field]);
        }
    }

    if ($request->has('id') && $request->input('id')) {
        $service = MobileDevelopment::findOrFail($request->input('id'));
        $service->update($validatedData);
        $message = 'Услуга успешно обновлена!';
    } else {
        MobileDevelopment::create($validatedData);
        $message = 'Услуга успешно добавлена!';
    }

    return redirect()->route('mobile.index')->with('success', $message);
}

public function updateService(Request $request, $id)
{
    // Валидация данных
    $validated = $request->validate([
        'title_ru' => 'required|string|max:40',
        'title_en' => 'nullable|string|max:40',
        'title_tm' => 'nullable|string|max:40',
        'categories_ru' => 'array',
        'categories_en' => 'array',
        'categories_tm' => 'array',
    ]);

    // Дополнительные проверки
    foreach (['title_ru', 'title_en', 'title_tm'] as $field) {
        if (is_array($validated[$field] ?? null)) {
            $validated[$field] = json_encode($validated[$field]);
        }
    }

    // Поиск записи
    $service = MobileDevelopment::findOrFail($id);

    // Обновление данных
    $service->update($validated);

    return redirect()->route('mobile.index')->with('success', 'Услуга обновлена успешно.');
}

}
