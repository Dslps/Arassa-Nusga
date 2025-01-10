<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\MobileDevelopment;
use App\Models\ImplementationStagesMobile;

class MobileController extends Controller
{
    public function index(){

        $mobile = Mobile::first() ?? new Mobile();
        $services = MobileDevelopment::all();
        $implementationStages = ImplementationStagesMobile::all();

        return view('service.mobile', compact('mobile', 'services', 'implementationStages'));
    }
}
