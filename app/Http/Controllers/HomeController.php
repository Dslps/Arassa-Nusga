<?php
namespace App\Http\Controllers;

use App\Models\HomeDash;
use App\Models\Service;
use App\Models\AboutUsHome;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HomeDash::all();
        $services = Service::all();
        $aboutUs = AboutUsHome::first(); // Получаем первую запись "О нас"

        return view('home', compact('slides', 'services', 'aboutUs'));
    }
}

