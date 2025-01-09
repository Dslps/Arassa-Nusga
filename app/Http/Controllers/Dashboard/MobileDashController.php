<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Mobile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MobileDashController extends Controller
{
    public function index(){

        $mobile = Mobile::first() ?? new Mobile();

        return view('dashboard.service.mobile', compact('mobile'));
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

    $mobile = Mobile::first() ?? new Mobile();

    if ($request->hasFile('photos')) {
        if ($mobile->photos && is_array($mobile->photos)) {
            foreach ($mobile->photos as $oldPhoto) {
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

        $mobile->photos = $photoPaths;
    }

    $mobile->title_ru = $validated['title_ru'];
    $mobile->title_en = $validated['title_en'];
    $mobile->title_tm = $validated['title_tm'];
    $mobile->categories_ru = $validated['categories_ru'];
    $mobile->categories_en = $validated['categories_en'];
    $mobile->categories_tm = $validated['categories_tm'];

    $mobile->save();

    return redirect()->back()->with('success', 'Данные успешно сохранены!');
}

}
