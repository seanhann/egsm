<?php namespace App\Http\Middleware;

use Closure;

class NoCache {

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->header('Cache-Control', 'private, max-age=0, no-store, no-cache, must-revalidate');
        $response->header('Pragma', 'no-cache');

        return $response;
    }
}
