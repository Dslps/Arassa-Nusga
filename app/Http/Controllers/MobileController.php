<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;

class MobileController extends Controller
{
    public function index(){

        $mobile = Mobile::first() ?? new Mobile();

        return view('service.mobile', compact('mobile'));
    }
}
