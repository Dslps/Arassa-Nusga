<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\HomeDash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeDashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = HomeDash::all();
        return view('dashboard.home', compact('forms'));
    }

    public function store(Request $request)
{
    // Получаем данные из формы
    $formsData = $request->input('forms', []);

    // Убедимся, что данные представляют собой массив
    if (!is_array($formsData)) {
        return redirect()->back()->withErrors(['forms' => 'Некорректные данные формы.']);
    }

    foreach ($formsData as $formData) {
        // Убедимся, что каждая форма — массив
        if (!is_array($formData)) {
            continue; // Пропускаем, если форма некорректна
        }

        // Проверяем, передан ли ID
        if (isset($formData['id']) && !empty($formData['id'])) {
            // Если ID указан, обновляем существующую запись
            $form = HomeDash::find($formData['id']);
            if ($form) {
                $form->title = $formData['title'];
                $form->description = $formData['description'] ?? null;

                // Если есть новое изображение, обновляем его
                if (!empty($formData['image'])) {
                    if ($form->image_path && \Storage::exists('public/' . $form->image_path)) {
                        \Storage::delete('public/' . $form->image_path);
                    }
                    $form->image_path = $formData['image']->store('images', 'public');
                }

                $form->save();
            }
        } else {
            // Если ID нет, проверяем на дубликат
            $existingForm = HomeDash::where('title', $formData['title'])
                                    ->where('description', $formData['description'] ?? '')
                                    ->first();

            // Если нет дубликата, создаем новую запись
            if (!$existingForm) {
                $newForm = new HomeDash();
                $newForm->title = $formData['title'];
                $newForm->description = $formData['description'] ?? null;

                // Если есть изображение, сохраняем его
                if (!empty($formData['image'])) {
                    $newForm->image_path = $formData['image']->store('images', 'public');
                }

                $newForm->save();
            }
        }
    }

    return redirect()->route('home-dash.index')->with('success', 'Данные успешно сохранены!');
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
        // Найти запись
        $form = HomeDash::findOrFail($id);
    
        // Валидировать данные
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
    
        // Обновить данные
        $form->title = $validatedData['title'];
        $form->description = $validatedData['description'];
    
        // Если есть новое изображение, сохранить его
        if ($request->hasFile('image')) {
            if ($form->image_path && \Storage::exists('public/' . $form->image_path)) {
                \Storage::delete('public/' . $form->image_path);
            }
            $form->image_path = $request->file('image')->store('images', 'public');
        }
    
        $form->save();
    
        return redirect()->route('home-dash.index')->with('success', 'Запись обновлена.');
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
        return redirect()->route('home-dash.index')->with('success', 'Запись удалена.');
    }

    
    
}
