<?php
namespace App\Http\Controllers;

use App\Models\HomeDash;
use App\Models\Service;
use App\Models\AboutUsHome;
use App\Models\ProjectStore;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HomeDash::all();
        $services = Service::all();
        $aboutUs = AboutUsHome::first(); 
        $projectstore = ProjectStore::take(3)->get();
        $partners = Partner::paginate(50); 

        return view('home', compact('slides', 'services', 'aboutUs','projectstore','partners'));
    }
}

