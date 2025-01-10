<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Web;

class WebDevelopmentController extends Controller
{
    public function index(){

        $web = Web::first() ?? new Web();

        return view('service.web-development', compact('web'));
    }
}
