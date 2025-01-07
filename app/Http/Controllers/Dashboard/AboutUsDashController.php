<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Principle;
use Illuminate\Support\Facades\Storage;
use App\Models\CompanyDescription;
use App\Models\Achievement;
use App\Models\Employee;

class AboutUsDashController extends Controller
{
    /**
     * Отображение страницы "О нас" и "Принципы работы"
     */
    public function index()
{
    // Получение всех записей принципов
    $principles = Principle::all();

    // Получение данных "О нас" или создание новой записи
    $aboutUs = AboutUs::first() ?? new AboutUs();

    // Получение данных описания компаний
    $companyDescription = CompanyDescription::first() ?? new CompanyDescription();

    // Получение данных достижений
    $achievement = Achievement::first() ?? new Achievement();

    // Получение данных сотрудников
    $employees = Employee::all();

    return view('dashboard.about-us', compact('principles', 'aboutUs', 'companyDescription', 'achievement', 'employees'));
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

        if ($request->hasFile('image')) {
            if ($principle->photos) {
                Storage::disk('public')->delete($principle->photos);
            }
            $validated['photos'] = $request->file('image')->store('principles', 'public');
        }

        $principle->update($validated);

        return redirect()->back()->with('success', 'Принцип успешно обновлён!');
    }

    public function principlesDestroy($id)
    {
        $principle = Principle::findOrFail($id);

        if ($principle->photos) {
            Storage::disk('public')->delete($principle->photos);
        }

        $principle->delete();

        return redirect()->back()->with('success', 'Принцип успешно удалён!');
    }


    //--------------------------------------------------------------------------
    // описание компаний 

    public function companyDescriptionsStore(Request $request)
    {
        $validated = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_tm' => 'nullable|string|max:255',
            'description_ru' => 'required|string',
            'description_en' => 'nullable|string',
            'description_tm' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Загрузка фотографий
        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('company_photos', 'public');
            }
        }

        // Сохранение данных
        CompanyDescription::create([
            'title_ru' => $validated['title_ru'],
            'title_en' => $validated['title_en'] ?? null,
            'title_tm' => $validated['title_tm'] ?? null,
            'description_ru' => $validated['description_ru'],
            'description_en' => $validated['description_en'] ?? null,
            'description_tm' => $validated['description_tm'] ?? null,
            'photos' => implode(',', $photoPaths),
        ]);

        return redirect()->back()->with('success', 'Описание компании успешно добавлено!');
    }

    /**
     * Обновление описания компании
     */
    public function companyDescriptionsUpdate(Request $request)
{
    $validated = $request->validate([
        'title_ru' => 'required|string|max:255',
        'title_en' => 'nullable|string|max:255',
        'title_tm' => 'nullable|string|max:255',
        'description_ru' => 'required|string',
        'description_en' => 'nullable|string',
        'description_tm' => 'nullable|string',
        'photos' => 'nullable|array',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:7000',
    ]);

    // Получение первой записи или создание новой
    $companyDescription = CompanyDescription::first() ?? new CompanyDescription();

    // Удаление старых фотографий, если загружаются новые
    if ($request->hasFile('photos')) {
        if ($companyDescription->photos) {
            foreach (explode(',', $companyDescription->photos) as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        // Загрузка новых фотографий
        $photoPaths = [];
        foreach ($request->file('photos') as $photo) {
            $photoPaths[] = $photo->store('company_photos', 'public');
        }

        // Обновление фотографий
        $companyDescription->photos = implode(',', $photoPaths);
    }

    // Обновление текстовых данных
    $companyDescription->fill([
        'title_ru' => $validated['title_ru'],
        'title_en' => $validated['title_en'] ?? null,
        'title_tm' => $validated['title_tm'] ?? null,
        'description_ru' => $validated['description_ru'],
        'description_en' => $validated['description_en'] ?? null,
        'description_tm' => $validated['description_tm'] ?? null,
    ])->save();

    return redirect()->back()->with('success', 'Описание компании успешно обновлено!');
}

    

    /**
     * Удаление описания компании
     */
    public function companyDescriptionsDestroy($id)
    {
        $companyDescription = CompanyDescription::findOrFail($id);

        // Удаление фотографий
        if ($companyDescription->photos) {
            foreach (explode(',', $companyDescription->photos) as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        $companyDescription->delete();

        return redirect()->back()->with('success', 'Описание компании успешно удалено!');
    }

    // -------------------------------------------------
    public function achievementsIndex()
{
    $achievements = Achievement::all(); 
    return view('dashboard.achievements', compact('achievements'));
}

public function achievementsStore(Request $request)
{
    $validated = $request->validate([
        'top_text_ru' => 'nullable|string',
        'top_text_en' => 'nullable|string',
        'top_text_tm' => 'nullable|string',
        'title_ru' => 'required|string|max:255',
        'title_en' => 'nullable|string|max:255',
        'title_tm' => 'nullable|string|max:255',
        'description_ru' => 'nullable|string',
        'description_en' => 'nullable|string',
        'description_tm' => 'nullable|string',
    ]);

    Achievement::create($validated);

    return redirect()->back()->with('success', 'Достижение успешно добавлено!');
}

public function achievementsStoreOrUpdate(Request $request)
{
    $validated = $request->validate([
        'top_text_ru' => 'nullable|string',
        'top_text_en' => 'nullable|string',
        'top_text_tm' => 'nullable|string',
        'title_ru' => 'required|string|max:255',
        'title_en' => 'nullable|string|max:255',
        'title_tm' => 'nullable|string|max:255',
        'description_ru' => 'required|string',
        'description_en' => 'nullable|string',
        'description_tm' => 'nullable|string',
    ]);

    $achievement = Achievement::first() ?? new Achievement();

    $achievement->fill($validated);
    $achievement->save();

    return redirect()->back()->with('success', 'Данные успешно сохранены!');
}


public function achievementsDestroy($id)
{
    $achievement = Achievement::findOrFail($id);
    $achievement->delete();

    return redirect()->back()->with('success', 'Достижение успешно удалено!');
}
// --------------------------------------------------------------
public function employeesStore(Request $request)
    {
        $validated = $request->validate([
            'position_ru' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'position_tm' => 'nullable|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Сохранение изображения
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('employee_photos', 'public');
        }

        // Сохранение данных в базу
        Employee::create([
            'position_ru' => $validated['position_ru'],
            'position_en' => $validated['position_en'] ?? null,
            'position_tm' => $validated['position_tm'] ?? null,
            'name_ru' => $validated['name_ru'],
            'name_en' => $validated['name_en'] ?? null,
            'name_tm' => $validated['name_tm'] ?? null,
            'photo' => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Сотрудник успешно добавлен!');
    }

    /**
     * Обновление данных сотрудника.
     */
    public function employeesUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'position_ru' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'position_tm' => 'nullable|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = Employee::findOrFail($id);

        // Обновление изображения
        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $validated['photo'] = $request->file('photo')->store('employee_photos', 'public');
        }

        // Обновление данных
        $employee->update($validated);

        return redirect()->back()->with('success', 'Данные сотрудника успешно обновлены!');
    }

    /**
     * Удаление сотрудника.
     */
    public function employeesDestroy($id)
    {
        $employee = Employee::findOrFail($id);

        // Удаление изображения
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        // Удаление записи
        $employee->delete();

        return redirect()->back()->with('success', 'Сотрудник успешно удалён!');
    }
}
