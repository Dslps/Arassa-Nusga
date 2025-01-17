<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bitrix24;
use App\Models\Bitrix24Cloud;
use App\Models\Bitrix24Boxes;
use App\Models\ImplementationStagesBitrix24;
use Illuminate\Support\Facades\Storage;

class Bitrix24DashController extends Controller
{

    public function index()
    {
        $bitrix24 = Bitrix24::first() ?? new Bitrix24();
        $services = Bitrix24Cloud::all();
        $boxes = Bitrix24Boxes::all();
        $implementationStages = ImplementationStagesBitrix24::all();

        return view('dashboard.service.bitrix24', compact('bitrix24', 'services', 'boxes', 'implementationStages'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tm' => 'required|string|max:255',

            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_tm' => 'required|string',

            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        $bitrix24 = Bitrix24::first() ?? new Bitrix24();

        if ($request->hasFile('photos')) {
        
            if ($bitrix24->photos && is_array($bitrix24->photos)) {
                foreach ($bitrix24->photos as $oldPhoto) {
                 
                    if (Storage::disk('public')->exists($oldPhoto)) {
                        Storage::disk('public')->delete($oldPhoto);
                    }
                }
            }

        
            $photoPaths = [];
            foreach ($request->file('photos') as $photo) {
                // Сохраняем фото в директорию 'public/photos' и получаем путь
                $path = $photo->store('photos', 'public');
                $photoPaths[] = $path;
            }

          
            $bitrix24->photos = $photoPaths;
        }

        // Обновляем другие поля
        $bitrix24->title_ru = $validated['title_ru'];
        $bitrix24->title_en = $validated['title_en'];
        $bitrix24->title_tm = $validated['title_tm'];
        $bitrix24->description_ru = $validated['description_ru'];
        $bitrix24->description_en = $validated['description_en'];
        $bitrix24->description_tm = $validated['description_tm'];


        $bitrix24->save();

        return redirect()->back()->with('success', 'Данные успешно сохранены!');
    }

    // -------------------------------------------------------------

    public function storeService(Request $request)
{
    // Валидация данных
    $validatedData = $request->validate([
        'title_ru' => 'required|string|max:60',
        'title_en' => 'nullable|string|max:60',
        'title_tm' => 'nullable|string|max:60',
        'categories_ru' => 'nullable|array',
        'categories_en' => 'nullable|array',
        'categories_tm' => 'nullable|array',
        'discount' => 'nullable|integer|min:0|max:100', // Сделано необязательным
        'price' => 'nullable|numeric|min:0', // Сделано необязательным
    ]);

    if ($request->has('id') && $request->input('id')) {
        // Обновление существующей записи
        $service = Bitrix24Cloud::findOrFail($request->input('id'));
        $service->update($validatedData);
        $message = 'Услуга успешно обновлена!';
    } else {
        // Получение минимального доступного ID
        $existingIds = Bitrix24Cloud::pluck('id')->toArray();
        sort($existingIds);

        $newId = 1; 
        foreach ($existingIds as $id) {
            if ($id != $newId) {
                break; 
            }
            $newId++;
        }

        // Установка нового ID
        $validatedData['id'] = $newId;

        // Создание новой записи
        Bitrix24Cloud::create($validatedData);
        $message = 'Услуга успешно добавлена!';
    }

    return redirect()->route('bitrix24.index')->with('success', $message);
}

    public function updateService(Request $request, $id)
{
    \Log::info('ID:', ['id' => $id]);
    \Log::info('Request data:', $request->all());

    $validatedData = $request->validate([
        'title_ru' => 'required|string|max:60',
        'title_en' => 'nullable|string|max:60',
        'title_tm' => 'nullable|string|max:60',
        'categories_ru' => 'nullable|array',
        'categories_en' => 'nullable|array',
        'categories_tm' => 'nullable|array',
        'discount' => 'required|integer|min:0|max:100',
        'price' => 'required|numeric|min:0',
    ]);

    $service = Bitrix24Cloud::findOrFail($id);
    $service->update($validatedData);

    return redirect()->back()->with('success', 'Данные успешно сохранены!');
}

    public function destroyService($id)
    {
        $service = Bitrix24Cloud::findOrFail($id);
        $service->delete();
    
        return redirect()->back()->with('success', 'Услуга успешно удалена!');
    }
    // ---------------------------------------------------------------
    public function storeBox(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:60',
            'title_en' => 'nullable|string|max:60',
            'title_tm' => 'nullable|string|max:60',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
            'discount' => 'nullable|integer|min:0|max:100',
            'price' => 'nullable|numeric|min:0',
        ]);

        if ($request->has('id') && $request->input('id')) {
            $box = Bitrix24Boxes::findOrFail($request->input('id'));
            $box->update($validatedData);
            $message = 'Коробка успешно обновлена!';
        } else {
            $existingIds = Bitrix24Boxes::pluck('id')->toArray();
            sort($existingIds);

            $newId = 1;
            foreach ($existingIds as $id) {
                if ($id != $newId) {
                    break; 
                }
                $newId++;
            }

            $validatedData['id'] = $newId;

            Bitrix24Boxes::create($validatedData);
            $message = 'Коробка успешно добавлена!';
        }

        return redirect()->route('bitrix24.index')->with('success', $message);
    }

    public function editBox($id)
    {
        $box = Bitrix24Boxes::findOrFail($id);

        return response()->json($box);
    }

    public function updateBox(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:60',
            'title_en' => 'nullable|string|max:60',
            'title_tm' => 'nullable|string|max:60',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
            'discount' => 'required|integer|min:0|max:100',
            'price' => 'required|numeric|min:0',
        ]);

        $box = Bitrix24Boxes::findOrFail($id);
        $box->update($validatedData);

        return redirect()->back()->with('success', 'Данные коробки успешно сохранены!');
    }

    public function destroyBox($id)
    {
        $box = Bitrix24Boxes::findOrFail($id);
        $box->delete();

        return redirect()->back()->with('success', 'Коробка успешно удалена!');
    }

    // ------------------------------------------------------------------------------------

    public function storeImplementationStage(Request $request)
    {
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:60',
            'title_en' => 'nullable|string|max:60',
            'title_tm' => 'nullable|string|max:60',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
        ]);

        if ($request->has('id') && $request->input('id')) {

            $stage = ImplementationStagesBitrix24::findOrFail($request->input('id'));
            $stage->update($validatedData);
            $message = 'Этап реализации успешно обновлен!';
        } else {
          
            ImplementationStagesBitrix24::create($validatedData);
            $message = 'Этап реализации успешно добавлен!';
        }

        return redirect()->route('bitrix24.index')->with('success', $message);
    }

    public function editImplementationStage($id)
    {
        $stage = ImplementationStagesBitrix24::findOrFail($id);
        return response()->json($stage);
    }

    public function updateImplementationStage(Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:60',
            'title_en' => 'nullable|string|max:60',
            'title_tm' => 'nullable|string|max:60',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
        ]);

        $stage = ImplementationStagesBitrix24::findOrFail($id);
        $stage->update($validatedData);

        return redirect()->back()->with('success', 'Данные этапа реализации успешно сохранены!');
    }

    /**
     * Удаление этапа реализации.
     */
    public function destroyImplementationStage($id)
    {
        $stage = ImplementationStagesBitrix24::findOrFail($id);
        $stage->delete();

        return redirect()->back()->with('success', 'Этап реализации успешно удален!');
    }
}
