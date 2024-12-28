<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeDash;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // Получаем данные из обеих моделей
        $slides = HomeDash::all();
        $services = Service::all();

        // Передаем все данные в представление "home"
        return view('home', compact('slides', 'services'));
    }
}
