<?php 



namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($request->has('lang')) {
            App::setLocale($request->input('lang'));
        }

        return $next($request);
    }
}


?>