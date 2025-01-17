<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Principle;
use App\Models\CompanyDescription;
use App\Models\Achievement;
use App\Models\Employee; 
use App\Models\Certificate; 
use App\Models\Partner;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();
        $principles = Principle::all();
        $companyDescriptions = CompanyDescription::all();
        $achievements = Achievement::all();
        $employees = Employee::all();
        $certificates = Certificate::all(); 
        $partners = Partner::paginate(50);

        // Передача всех данных в представление
        return view('about-us', compact(
            'aboutUs', 'principles', 'companyDescriptions', 'achievements', 'employees', 'certificates', 'partners'));
    }
}
