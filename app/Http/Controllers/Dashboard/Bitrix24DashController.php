<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bitrix24;
use App\Models\Bitrix24Cloud;
use Illuminate\Support\Facades\Storage;

class Bitrix24DashController extends Controller
{
    /**
     * Отображает форму создания/редактирования записи Bitrix24.
     *
     * @return \Illuminate\View\View
     */
    public function index()
{
    // Получение данных Bitrix24 или создание новой записи
    $bitrix24 = Bitrix24::first() ?? new Bitrix24();

    // Получение всех услуг
    $services = Bitrix24Cloud::all();

    // Передача переменных $bitrix24 и $services в представление
    return view('dashboard.service.bitrix24', compact('bitrix24', 'services'));
}


    /**
     * Обрабатывает отправку формы и сохраняет данные в базе данных.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            // Валидация титульных текстов
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tm' => 'required|string|max:255',

            // Валидация описаний
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_tm' => 'required|string',

            // Валидация фотографий
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Получение существующей записи или создание новой
        $bitrix24 = Bitrix24::first() ?? new Bitrix24();

        // Если загружены новые фотографии, удаляем старые
        if ($request->hasFile('photos')) {
            // Проверяем, есть ли уже загруженные фотографии
            if ($bitrix24->photos && is_array($bitrix24->photos)) {
                foreach ($bitrix24->photos as $oldPhoto) {
                    // Проверяем, существует ли файл перед удалением
                    if (Storage::disk('public')->exists($oldPhoto)) {
                        Storage::disk('public')->delete($oldPhoto);
                    }
                }
            }

            // Обработка загрузки новых фотографий
            $photoPaths = [];
            foreach ($request->file('photos') as $photo) {
                // Сохраняем фото в директорию 'public/photos' и получаем путь
                $path = $photo->store('photos', 'public');
                $photoPaths[] = $path;
            }

            // Обновляем поле 'photos' новыми путями
            $bitrix24->photos = $photoPaths;
        }

        // Обновляем другие поля
        $bitrix24->title_ru = $validated['title_ru'];
        $bitrix24->title_en = $validated['title_en'];
        $bitrix24->title_tm = $validated['title_tm'];
        $bitrix24->description_ru = $validated['description_ru'];
        $bitrix24->description_en = $validated['description_en'];
        $bitrix24->description_tm = $validated['description_tm'];

        // Сохраняем запись в базе данных
        $bitrix24->save();

        // Перенаправляем обратно с сообщением об успехе
        return redirect()->back()->with('success', 'Данные успешно сохранены!');
    }

    // -------------------------------------------------------------

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

        $newId = 1; // Начинаем с ID 1
        foreach ($existingIds as $id) {
            if ($id != $newId) {
                break; // Найден пропущенный ID
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

        
    


    /**
     * Обновление записи.
     */
    public function updateService(Request $request, $id)
{
    \Log::info('ID:', ['id' => $id]);
    \Log::info('Request data:', $request->all());

    $validatedData = $request->validate([
        'title_ru' => 'required|string|max:40',
        'title_en' => 'nullable|string|max:40',
        'title_tm' => 'nullable|string|max:40',
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


    /**
     * Удаление записи.
     */
    public function destroyService($id)
    {
        $service = Bitrix24Cloud::findOrFail($id);
        $service->delete();
    
        return redirect()->back()->with('success', 'Услуга успешно удалена!');
    }
    
}
