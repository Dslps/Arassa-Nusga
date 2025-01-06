<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Подключаем модель AboutUs
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();

        return view('about-us', compact('aboutUs'));
    }
}
