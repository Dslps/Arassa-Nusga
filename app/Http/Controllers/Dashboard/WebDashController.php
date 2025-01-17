<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\WebService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Web;
use App\Models\ImplementationStagesWeb;

class WebDashController extends Controller
{
    public function index(){

        $web = Web::first() ?? new Web();
        $services = WebService::all();
        $implementationStages = ImplementationStagesWeb::all();
        
        return view('dashboard.service.web-development', compact('web', 'services',  'implementationStages'));
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

        $web = Web::first() ?? new Web();

        if ($request->hasFile('photos')) {
            if ($web->photos && is_array($web->photos)) {
                foreach ($web->photos as $oldPhoto) {
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

            $web->photos = $photoPaths;
        }

        $web->title_ru = $validated['title_ru'];
        $web->title_en = $validated['title_en'];
        $web->title_tm = $validated['title_tm'];
        $web->categories_ru = $validated['categories_ru'];
        $web->categories_en = $validated['categories_en'];
        $web->categories_tm = $validated['categories_tm'];

        $web->save();

        return redirect()->back()->with('success', 'Данные успешно сохранены!');
    }
    // --------------------------------------------------------------------------

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
            'discount' => 'nullable|integer|min:0|max:100',
            'price' => 'nullable|numeric|min:0',
        ]);

        if ($request->has('id') && $request->input('id')) {

            $services = WebService::findOrFail($request->input('id'));
            $services->update($validatedData);
            $message = 'Услуга успешно обновлен!';
        } else {
            // Получение минимально доступного ID
            $existingIds = WebService::pluck('id')->toArray();
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
            WebService::create($validatedData);
            $message = 'Касперский успешно добавлен!';
        }

        return redirect()->route('web.index')->with('success', $message);
    }

    public function editService($id)
    {
        $services = WebService::findOrFail($id);

        return response()->json($services);
    }

    public function updateService(Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:60',
            'title_en' => 'nullable|string|max:60',
            'title_tm' => 'nullable|string|max:60',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
            'discount' => 'integer|min:0|max:100',
            'price' => 'required|numeric|min:0',
        ]);

        $services = WebService::findOrFail($id);
        $services->update($validatedData);

        return redirect()->back()->with('success', 'Данные сервиса успешно сохранены!');
    }

    public function destroyService($id)
    {
        $services = WebService::findOrFail($id);
        $services->delete();

        return redirect()->back()->with('success', 'Данные сервиса успешно удалены!');
    }

    // ----------------------------------------------------------------

    public function storeImplementationStage(Request $request)
    {
        $validatedData = $request->validate([
            'title_ru' => 'required|string|max:40',
            'title_en' => 'nullable|string|max:40',
            'title_tm' => 'nullable|string|max:40',
            'categories_ru' => 'nullable|array',
            'categories_en' => 'nullable|array',
            'categories_tm' => 'nullable|array',
        ]);

        if ($request->has('id') && $request->input('id')) {

            $stage = ImplementationStagesWeb::findOrFail($request->input('id'));
            $stage->update($validatedData);
            $message = 'Этап реализации успешно обновлен!';
        } else {

            ImplementationStagesWeb::create($validatedData);
            $message = 'Этап реализации успешно добавлен!';
        }

        return redirect()->route('web.index')->with('success', $message);
    }

    public function editImplementationStage($id)
    {
        $stage = ImplementationStagesWeb::findOrFail($id);
        return response()->json($stage);
    }

    public function updateImplementationStage(Request $request, $id)
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

        $stage = ImplementationStagesWeb::findOrFail($id);
        $stage->update($validatedData);

        return redirect()->back()->with('success', 'Данные этапа реализации успешно сохранены!');
    }

    /**
     * Удаление этапа реализации.
     */
    public function destroyImplementationStage($id)
    {
        $stage = ImplementationStagesWeb::findOrFail($id);
        $stage->delete();

        return redirect()->back()->with('success', 'Этап реализации успешно удален!');
    }
}