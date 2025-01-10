<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Web;

class WebDashController extends Controller
{
    public function index(){

        $web = Web::first() ?? new Web();
        
        return view('dashboard.service.web-development', compact('web'));
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
}
