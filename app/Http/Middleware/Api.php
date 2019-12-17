<?php

namespace App\Http\Middleware;

use Closure;

class Api
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
        $apiKey = env('API_KEY');

        if ($request->header('x-api-key')!=$apiKey)
        {
            return response()->json(['error' => 'No Token or Not Valid'], 401);
        }

        return $next($request);
    }
}
