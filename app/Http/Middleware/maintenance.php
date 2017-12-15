<?php

namespace App\Http\Middleware;

use App\Entities\Config;
use Closure;

class maintenance
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
        $config = Config::first();
        if ($config && $config['maintenance'] == 1) {
            return response()->view('errors.503');
        }
        return $next($request);
    }
}
