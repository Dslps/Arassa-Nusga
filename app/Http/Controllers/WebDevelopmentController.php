<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebDevelopmentController extends Controller
{
    public function index(){
        return view('service.web-development');
    }
}
