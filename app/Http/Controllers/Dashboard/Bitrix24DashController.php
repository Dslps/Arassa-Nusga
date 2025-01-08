<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Bitrix24DashController extends Controller
{
    public function index(){
        return view('dashboard.service.bitrix24');
    }
}
