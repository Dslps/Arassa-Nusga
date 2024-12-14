<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Bitrix24Controller extends Controller
{
    public function index(){
        return view('project.bitrix24');
    }
}
