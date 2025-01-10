<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Antiviruses;

use Illuminate\Http\Request;

class AntivirusesDashController extends Controller
{
    public function index(){

        $antiviruses = Antiviruses::first() ?? new Antiviruses();

        return view('dashboard.service.antiviruses', compact('antiviruses'));
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

        $antiviruses = Antiviruses::first() ?? new Antiviruses();

        if ($request->hasFile('photos')) {
            if ($antiviruses->photos && is_array($antiviruses->photos)) {
                foreach ($antiviruses->photos as $oldPhoto) {
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

            $antiviruses->photos = $photoPaths;
        }

        $antiviruses->title_ru = $validated['title_ru'];
        $antiviruses->title_en = $validated['title_en'];
        $antiviruses->title_tm = $validated['title_tm'];
        $antiviruses->categories_ru = $validated['categories_ru'];
        $antiviruses->categories_en = $validated['categories_en'];
        $antiviruses->categories_tm = $validated['categories_tm'];

        $antiviruses->save();

        return redirect()->back()->with('success', 'Данные успешно сохранены!');
    }
}
