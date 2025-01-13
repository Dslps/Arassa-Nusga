<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogStore;

class BlogDashController extends Controller
{
    public function index(){

        $blog = Blog::first() ?? new Blog();
        $blogstore = BlogStore::all();

        return view('dashboard.blog', compact('blog', 'blogstore'));
    }

    public function store(Request $request)
    {
        $blog = Blog::first() ?? new Blog();

        if ($request->hasFile('photos')) {
            $photosPaths = [];
            foreach ($request->file('photos') as $file) {
                $path = $file->store('blog_photos', 'public');
                $photosPaths[] = $path;
            }
            $blog->photos = implode(',', $photosPaths);
        }

        // Обновление текстовых полей
        $fields = [
            'title_ru', 'title_en', 'title_tm',
            'description_ru', 'description_en', 'description_tm',
            'additional_ru', 'additional_en', 'additional_tm',
        ];

        foreach ($fields as $field) {
            if ($request->filled($field)) {
                $blog->$field = $request->input($field);
            }
        }

        $blog->save();

        return redirect()->back()->with('success', 'Данные успешно обновлены!');
    }

    // ---------------------------------------------------

    public function blogStore(Request $request)
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

        BlogStore::create($validated);

        return redirect()->back()->with('success', 'Принцип успешно добавлен!');
    }

    public function blogUpdate(Request $request, $id)
    {
        $blogstore = BlogStore::findOrFail($id);

        $validated = $request->validate([
            'title_ru' => 'required|string|max:30',
            'description_ru' => 'required|string|max:200',
            'additional-information_ru' => 'required|string|max:200',
            'title_en' => 'nullable|string|max:30',
            'description_en' => 'nullable|string|max:200',
            'additional-information_en' => 'nullable|string|max:200',
            'title_tm' => 'nullable|string|max:30',
            'description_tm' => 'nullable|string|max:200',
            'additional-information_tm' => 'nullable|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blogstore->photos) {
                Storage::disk('public')->delete($blogstore->photos);
            }
            $validated['photos'] = $request->file('image')->store('principles', 'public');
        }

        $blogstore->update($validated);

        return redirect()->back()->with('success', 'Принцип успешно обновлён!');
    }

    public function blogShow($id)
{
    // Получаем конкретную запись из таблицы
    $blogstore = BlogStore::findOrFail($id);

    // Возвращаем шаблон и передаём туда данные
    return view('components.blog-details', compact('blogstore'));
}


    public function blogDestroy($id)
    {
        $blogstore = BlogStore::findOrFail($id);

        if ($blogstore->photos) {
            Storage::disk('public')->delete($blogstore->photos);
        }

        $blogstore->delete();

        return redirect()->back()->with('success', 'Принцип успешно удалён!');
    }
}
