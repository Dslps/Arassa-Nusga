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
use App\Models\Certificate;

class AboutUsDashController extends Controller
{
    public function index()
    {
        $principles = Principle::all();
        $aboutUs = AboutUs::first() ?? new AboutUs();
        $companyDescription = CompanyDescription::first() ?? new CompanyDescription();
        $achievement = Achievement::first() ?? new Achievement();
        $employees = Employee::all();
        $certificates = Certificate::paginate(20); 

        return view('dashboard.about-us', compact('principles', 'aboutUs', 'companyDescription', 'achievement', 'employees', 'certificates'));
    }

    public function store(Request $request)
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();

        if ($request->hasFile('photos')) {
            $photosPaths = [];
            foreach ($request->file('photos') as $file) {
                $path = $file->store('about_us_photos', 'public');
                $photosPaths[] = $path;
            }
            $aboutUs->photos = implode(',', $photosPaths);
        }

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

    // ------------------------------------------------------------

    public function principlesStore(Request $request)
    {
        $validated = $request->validate([
            'title_ru' => 'required|string|max:30',
            'description_ru' => 'required|string|max:200',
            'title_en' => 'nullable|string|max:30',
            'description_en' => 'nullable|string|max:200',
            'title_tm' => 'nullable|string|max:30',
            'description_tm' => 'nullable|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

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
            'title_ru' => 'required|string|max:50',
            'description_ru' => 'required|string|max:200',
            'title_en' => 'nullable|string|max:50',
            'description_en' => 'nullable|string|max:200',
            'title_tm' => 'nullable|string|max:50',
            'description_tm' => 'nullable|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
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
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('company_photos', 'public');
            }
        }

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
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
    ]);

    $companyDescription = CompanyDescription::first() ?? new CompanyDescription();

    if ($request->hasFile('photos')) {
        if ($companyDescription->photos) {
            foreach (explode(',', $companyDescription->photos) as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        $photoPaths = [];
        foreach ($request->file('photos') as $photo) {
            $photoPaths[] = $photo->store('company_photos', 'public');
        }

        $companyDescription->photos = implode(',', $photoPaths);
    }

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

    public function companyDescriptionsDestroy($id)
    {
        $companyDescription = CompanyDescription::findOrFail($id);

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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('employee_photos', 'public');
        }

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

    public function employeesUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'position_ru' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'position_tm' => 'nullable|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $employee = Employee::findOrFail($id);

        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $validated['photo'] = $request->file('photo')->store('employee_photos', 'public');
        }

        $employee->update($validated);

        return redirect()->back()->with('success', 'Данные сотрудника успешно обновлены!');
    }

    public function employeesDestroy($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();

        return redirect()->back()->with('success', 'Сотрудник успешно удалён!');
    }
    // --------------------------------------------------------------

    public function saveCertificates(Request $request)
    {
        $maxCertificates = 50;
        $currentCount = Certificate::count();
        $newCount = count($request->file('photos', []));

        if(($currentCount + $newCount) > $maxCertificates){
            return redirect()->back()->withErrors(['photos' => 'Максимальное количество сертификатов составляет '.$maxCertificates.'.']);
        }

        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000', 
        ], [
            'photos.*.required' => 'Каждый файл обязателен для загрузки.',
            'photos.*.image' => 'Загружаемый файл должен быть изображением.',
            'photos.*.mimes' => 'Поддерживаемые форматы: jpeg, png, jpg, gif, svg.',
            'photos.*.max' => 'Максимальный размер файла: 5000.',
        ]);

        if($request->hasFile('photos')){
            foreach($request->file('photos') as $photo){

                $filename = time().'_'.$photo->getClientOriginalName();
                $path = $photo->storeAs('certificates', $filename, 'public');

                Certificate::create([
                    'photo_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Сертификаты успешно загружены!');
    }

    public function deleteCertificate($id)
    {

        $certificate = Certificate::findOrFail($id);

        if(Storage::disk('public')->exists($certificate->photo_path)){
            Storage::disk('public')->delete($certificate->photo_path);
        }

        $certificate->delete();

        return redirect()->back()->with('success', 'Сертификат успешно удален!');
    }
}
