<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class AboutUsDashController extends Controller
{
    public function index(){
        return view('dashboard.about-us');
    }
}
