<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitrix24;
use App\Models\Bitrix24Cloud;
use App\Models\Bitrix24Boxes; 
use App\Models\ImplementationStagesBitrix24;

class Bitrix24Controller extends Controller
{
    public function index()
    {
        $bitrix24 = Bitrix24::first() ?? new Bitrix24();
        $bitrix24Cloud = Bitrix24Cloud::all();
        $boxes = Bitrix24Boxes::all(); 
        $implementationStages = ImplementationStagesBitrix24::all();

        return view('service.bitrix24', compact('bitrix24', 'bitrix24Cloud', 'boxes','implementationStages')); 
    }
}
