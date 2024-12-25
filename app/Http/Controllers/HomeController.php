<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeDash;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HomeDash::all();
        return view('home', compact('slides'));
    }
    
}
