<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $partners = Partner::paginate(50); 

        return view('dashboard.index', compact('partners')); 
    }
    public function savePartners(Request $request)
    {
        $maxPartners = 50;
        $currentCount = Partner::count();
        $newCount = count($request->file('photos', []));
        if (($currentCount + $newCount) > $maxPartners) {
            return redirect()->back()->withErrors(['photos' => 'Максимальное количество партнеров составляет ' . $maxPartners . '.']);
        }

        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ], [
            'photos.*.required' => 'Каждый файл обязателен для загрузки.',
            'photos.*.image' => 'Загружаемый файл должен быть изображением.',
            'photos.*.mimes' => 'Поддерживаемые форматы: jpeg, png, jpg, gif, svg.',
            'photos.*.max' => 'Максимальный размер файла: 5000.',
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $filename = time() . '_' . $photo->getClientOriginalName();
                $path = $photo->storeAs('partners', $filename, 'public');
                Partner::create([
                    'photo_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Партнеры успешно загружены!');
    }

    public function deletePartner($id)
    {
        $partner = Partner::findOrFail($id);
        if (Storage::disk('public')->exists($partner->photo_path)) {
            Storage::disk('public')->delete($partner->photo_path);
        }
        $partner->delete();
        return redirect()->back()->with('success', 'Партнер успешно удален!');
    }
}
