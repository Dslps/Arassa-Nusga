<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', config('app.locale')); // Получаем язык из сессии или используем язык по умолчанию
        App::setLocale($locale); // Устанавливаем язык

        return $next($request);
    }
}
