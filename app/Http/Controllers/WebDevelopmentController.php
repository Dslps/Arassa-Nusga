<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Web;
use App\Models\WebService;
use App\Models\ImplementationStagesWeb;
use App\Models\ProjectStore;

class WebDevelopmentController extends Controller
{
    public function index(){

        $web = Web::first() ?? new Web();
        $services = WebService::all();
        $implementationStages = ImplementationStagesWeb::all();
        $projectstore = ProjectStore::take(5)->get();

        return view('service.web-development', compact('web', 'services', 'implementationStages', 'projectstore'));
    }
}
