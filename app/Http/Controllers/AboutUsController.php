<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Principle;

class AboutUsController extends Controller
{
    public function index()
    {
        // Получаем данные "О нас" или создаём пустую запись, если её нет
        $aboutUs = AboutUs::first() ?? new AboutUs();

        // Получаем все принципы
        $principles = Principle::all();

        // Передаём обе переменные в представление
        return view('about-us', compact('aboutUs', 'principles'));
    }
}
