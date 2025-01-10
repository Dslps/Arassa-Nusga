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
            $service = WebService::findOrFail($request->input('id'));
            $service->update($validatedData);
            $message = 'Услуга успешно обновлена!';
        } else {
            WebService::create($validatedData);
            $message = 'Услуга успешно добавлена!';
        }

        return redirect()->route('web.index')->with('success', $message);
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
        $service = WebService::findOrFail($id);

        // Обновление данных
        $service->update($validated);

        return redirect()->route('web.index')->with('success', 'Услуга обновлена успешно.');
    }
    public function destroyService($id)
    {
        $service = WebService::findOrFail($id);
        $service->delete();
    
        return redirect()->back()->with('success', 'Услуга успешно удалена!');
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
