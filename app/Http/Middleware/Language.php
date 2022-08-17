<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = 'mm';
        
        if (session()->has('language')) {
            $language = session('language');
        }

        App::setLocale($language);

        if ($language == 'mm') {
            Carbon::setlocale('my');
        }

        return $next($request);
    }
}
