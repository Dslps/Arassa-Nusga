<?php

namespace App\Http\Controllers;

use App\Models\Antiviruses;
use Illuminate\Http\Request;
use App\Models\Kaspersky;
use App\Models\Eset;

class AntivirusesController extends Controller
{
    public function index(){

        $antiviruses = Antiviruses::first() ?? new Antiviruses();
        $kaspersky = Kaspersky::all();
        $eset = Eset::all();

        return view('service.antiviruses', compact('antiviruses', 'kaspersky', 'eset'));
    }
}
