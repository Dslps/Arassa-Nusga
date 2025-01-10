<?php

namespace App\Http\Controllers;

use App\Models\Antiviruses;
use Illuminate\Http\Request;

class AntivirusesController extends Controller
{
    public function index(){

        $antiviruses = Antiviruses::first() ?? new Antiviruses();

        return view('service.antiviruses', compact('antiviruses'));
    }
}
