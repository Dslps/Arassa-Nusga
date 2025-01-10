<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Web;
use App\Models\WebService;

class WebDevelopmentController extends Controller
{
    public function index(){

        $web = Web::first() ?? new Web();
        $services = WebService::all();

        return view('service.web-development', compact('web', 'services'));
    }
}
