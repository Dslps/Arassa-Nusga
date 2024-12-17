<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AntivirusesController extends Controller
{
    public function index(){
        return view('service.antiviruses');
    }
}
