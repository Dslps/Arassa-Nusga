<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Получаем локаль из сессии
        $locale = Session::get('locale', config('app.locale'));

        // Устанавливаем локаль приложения
        App::setLocale($locale);

        // Логируем для проверки
        \Log::info('SetLocale Middleware: Locale set to ' . $locale);

        return $next($request);
    }
}
