<?php

namespace App\Http\Controllers;

use App\Models\Antiviruses;
use Illuminate\Http\Request;
use App\Models\Kaspersky;
use App\Models\Eset;
use App\Models\Pro32;

class AntivirusesController extends Controller
{
    public function index(){

        $antiviruses = Antiviruses::first() ?? new Antiviruses();
        $kaspersky = Kaspersky::all();
        $eset = Eset::all();
        $pro32 = Pro32::all();

        return view('service.antiviruses', compact('antiviruses', 'kaspersky', 'eset', 'pro32'));
    }
}
