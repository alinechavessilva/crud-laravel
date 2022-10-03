<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $params = $request->all();
        $hasTransversalPath = false;

        if (str_contains($request->fullUrl(), '%3C') == true ||
        str_contains($request->fullUrl(), '..%2F') == true) {
            $hasTransversalPath = true;
        }

        if (!$hasTransversalPath) {
            return $next($request);
        }

        return redirect($request->path());
    }
}
