<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Principle;
use App\Models\CompanyDescription; 

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();

        $principles = Principle::all();

        $companyDescriptions = CompanyDescription::all();

        return view('about-us', compact('aboutUs', 'principles', 'companyDescriptions'));
    }
}
