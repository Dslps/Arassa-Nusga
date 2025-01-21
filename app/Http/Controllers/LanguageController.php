<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLanguage($locale)
{
    if (in_array($locale, ['en', 'ru', 'tm'])) {
        // Сохраняем локаль в сессии
        Session::put('locale', $locale);
    }

    return redirect()->back();
}

}
