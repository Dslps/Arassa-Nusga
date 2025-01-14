<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\ProjectStore;

use Illuminate\Http\Request;

class ProjectDashController extends Controller
{
    public function index(){

        $project = Project::first() ?? new Project();
        $projectstore = ProjectStore::all();

        return view('dashboard.project', compact('project', 'projectstore'));
    }

    public function store(Request $request)
    {
        $project = Project::first() ?? new Project();

        if ($request->hasFile('photos')) {
            $photosPaths = [];
            foreach ($request->file('photos') as $file) {
                $path = $file->store('project_photos', 'public');
                $photosPaths[] = $path;
            }
            $project->photos = implode(',', $photosPaths);
        }

        $fields = [
            'title_ru', 'title_en', 'title_tm',
            'description_ru', 'description_en', 'description_tm',
            'additional_ru', 'additional_en', 'additional_tm',
        ];

        foreach ($fields as $field) {
            if ($request->filled($field)) {
                $project->$field = $request->input($field);
            }
        }

        $project->save();

        return redirect()->back()->with('success', 'Данные успешно обновлены!');
    }

    // ---------------------------------------------------------

    public function projectStore(Request $request)
    {
        $validated = $request->validate([
            'title_ru' => 'required|string|max:30',
            'description_ru' => 'required|string|max:200',
            'additional_ru' => 'required|string|max:200',
            'title_en' => 'nullable|string|max:30',
            'description_en' => 'nullable|string|max:200',
            'additional_en' => 'required|string|max:200',
            'title_tm' => 'nullable|string|max:30',
            'description_tm' => 'nullable|string|max:200',
            'additional_tm' => 'required|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Сохранение изображения
        if ($request->hasFile('image')) {
            $validated['photos'] = $request->file('image')->store('project', 'public');
        }

        ProjectStore::create($validated);

        return redirect()->back()->with('success', 'Проект успешно добавлен!');
    }

    public function projectUpdate(Request $request, $id)
    {
        $projectstore = ProjectStore::findOrFail($id);

        $validated = $request->validate([
            'title_ru' => 'required|string|max:50',
            'description_ru' => 'required|string|max:200',
            'additional_ru' => 'required|string',
            'title_en' => 'nullable|string|max:50',
            'description_en' => 'nullable|string|max:200',
            'additional_en' => 'nullable|string',
            'title_tm' => 'nullable|string|max:50',
            'description_tm' => 'nullable|string|max:200',
            'additional_tm' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            
        ]);

        if ($request->hasFile('image')) {
            if ($projectstore->photos) {
                Storage::disk('public')->delete($projectstore->photos);
            }
            $validated['photos'] = $request->file('image')->store('project', 'public');
            $request->validate([
                'photos.*' => 'file|mimes:jpeg,png,jpg,gif|max:5120',
            ], [
                'photos.*.max' => 'Размер файла не должен превышать 5 МБ.',
                'photos.*.mimes' => 'Допускаются только изображения форматов: jpeg, png, jpg, gif.'
            ]);
        }

        $projectstore->update($validated);

        return redirect()->back()->with('success', 'Блог успешно обновлён!');
    }

    public function projectShow($id)
    {
        // Получаем конкретную запись из таблицы
        $projectstore = ProjectStore::findOrFail($id);
    
        // Возвращаем шаблон и передаём туда данные
        return view('components.project-details', compact('projectstore'));
    }


    public function projectDestroy($id)
    {
        $projectstore = ProjectStore::findOrFail($id);

        if ($projectstore->photos) {
            Storage::disk('public')->delete($projectstore->photos);
        }

        $projectstore->delete();

        return redirect()->back()->with('success', 'Блог успешно удалён!');
    }
}
