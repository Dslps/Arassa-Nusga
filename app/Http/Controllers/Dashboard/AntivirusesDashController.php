<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Antiviruses;
use App\Models\Kaspersky;

use Illuminate\Http\Request;

class AntivirusesDashController extends Controller
{
    public function index(){

        $antiviruses = Antiviruses::first() ?? new Antiviruses();
        $kaspersky = Kaspersky::all();

        return view('dashboard.service.antiviruses', compact('antiviruses', 'kaspersky'));
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

        if (is_array($validatedData['title_ru'] ?? null) ||
    is_array($validatedData['title_en'] ?? null) ||
    is_array($validatedData['title_tm'] ?? null)) {
    return back()->withErrors('Неверный формат данных для названий.');
}

        $antiviruses = Antiviruses::first() ?? new Antiviruses();

        if ($request->hasFile('photos')) {
            if ($antiviruses->photos && is_array($antiviruses->photos)) {
                foreach ($antiviruses->photos as $oldPhoto) {
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

            $antiviruses->photos = $photoPaths;
        }

        $antiviruses->title_ru = $validated['title_ru'];
        $antiviruses->title_en = $validated['title_en'];
        $antiviruses->title_tm = $validated['title_tm'];
        $antiviruses->categories_ru = $validated['categories_ru'];
        $antiviruses->categories_en = $validated['categories_en'];
        $antiviruses->categories_tm = $validated['categories_tm'];

        $antiviruses->save();

        return redirect()->back()->with('success', 'Данные успешно сохранены!');
    }

    // -------------------------------------------------------------

    public function storeKaspersky(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:40',
            'title_en' => 'nullable|string|max:40',
            'title_tm' => 'nullable|string|max:40',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
            'discount' => 'nullable|integer|min:0|max:100',
            'price' => 'nullable|numeric|min:0',
        ]);

        if ($request->has('id') && $request->input('id')) {
            // Обновление существующей коробки
            $kaspersky = Kaspersky::findOrFail($request->input('id'));
            $kaspersky->update($validatedData);
            $message = 'Коробка успешно обновлена!';
        } else {
            // Получение минимально доступного ID
            $existingIds = Kaspersky::pluck('id')->toArray();
            sort($existingIds);

            $newId = 1; // Начинаем с ID 1
            foreach ($existingIds as $id) {
                if ($id != $newId) {
                    break; // Найден пропущенный ID
                }
                $newId++;
            }

            // Установка нового ID
            $validatedData['id'] = $newId;

            // Создание новой коробки
            Kaspersky::create($validatedData);
            $message = 'Коробка успешно добавлена!';
        }

        return redirect()->route('antiviruses.index')->with('success', $message);
    }

    public function editKaspersky($id)
    {
        $kaspersky = Kaspersky::findOrFail($id);

        return response()->json($kaspersky);
    }

    public function updateKaspersky(Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:40',
            'title_en' => 'nullable|string|max:40',
            'title_tm' => 'nullable|string|max:40',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
            'discount' => 'integer|min:0|max:100',
            'price' => 'required|numeric|min:0',
        ]);

        $kaspersky = Kaspersky::findOrFail($id);
        $kaspersky->update($validatedData);

        return redirect()->back()->with('success', 'Данные касперского успешно сохранены!');
    }

    public function destroykaspersky($id)
    {
        $kaspersky = Kaspersky::findOrFail($id);
        $kaspersky->delete();

        return redirect()->back()->with('success', 'Данные касперского успешно удалены!');
    }
}
