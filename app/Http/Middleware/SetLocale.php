<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        Log::info('SetLocale middleware is running');
        
        $locales = config('app.locales');
        $locale = Session::get('locale', config('app.locale'));

        if (in_array($locale, $locales)) {
            Log::info('Setting locale to: ' . $locale);
            App::setLocale($locale);
        } else {
            Log::info('Setting default locale to: ' . config('app.locale'));
            App::setLocale(config('app.locale'));
        }

        return $next($request);
    }
}