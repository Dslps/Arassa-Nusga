<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\HomeDash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeDashController extends Controller
{
    public function index()
    {
        $slides = HomeDash::all(); // Загружаем все записи
        return view('dashboard.home', compact('slides'));
    }
    public function home()
{
    $slides = HomeDash::all(); // Загружаем все записи

    // Возвращаем вид для домашней страницы и передаем слайды
    return view('home', compact('slides'));
}
    
    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title' => 'required|string|max:20',
            'description' => 'nullable|string|max:200',
            'image' => 'nullable|image|max:2048',
        ]);
    
        // Определяем следующий ID
        $nextId = HomeDash::max('id'); // Получаем максимальный ID в таблице
        $nextId = $nextId !== null ? $nextId + 1 : 0; // Если таблица пуста, начинаем с 0
    
        // Создаём новую запись
        $newForm = new HomeDash();
        $newForm->id = $nextId; // Устанавливаем ID
        $newForm->title = $validatedData['title'];
        $newForm->description = $validatedData['description'] ?? null;
    
        // Сохраняем изображение, если оно загружено
        if ($request->hasFile('image')) {
            $newForm->image_path = $request->file('image')->store('images', 'public');
        }
    
        $newForm->save();
    
        return redirect()->route('home-dash.index')->with('success', 'Запись успешно добавлена!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(HomeDash $homeDash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeDash $homeDash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $form = HomeDash::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $form->title = $validated['title'];
    $form->description = $validated['description'];

    if ($request->hasFile('image')) {
        if ($form->image_path && \Storage::exists('public/' . $form->image_path)) {
            \Storage::delete('public/' . $form->image_path);
        }
        $form->image_path = $request->file('image')->store('images', 'public');
    }

    $form->save();

    return redirect()->route('home-dash.index')->with('success', 'Запись успешно обновлена!');
}

    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $form = HomeDash::findOrFail($id);

    if ($form->image_path && \Storage::exists('public/' . $form->image_path)) {
        \Storage::delete('public/' . $form->image_path);
    }

    $form->delete();

    return redirect()->route('home-dash.index')->with('success', 'Запись успешно удалена!');
}

    
    

    
    
}
