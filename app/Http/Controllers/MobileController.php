<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\MobileDevelopment;

class MobileController extends Controller
{
    public function index(){

        $mobile = Mobile::first() ?? new Mobile();
        $services = MobileDevelopment::all();

        return view('service.mobile', compact('mobile', 'services'));
    }
}
