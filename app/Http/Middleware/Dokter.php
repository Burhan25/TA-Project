<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Dokter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset(auth()->user()->role)) {
            if (auth()->user()->role == 'dokter') {
                return $next($request);
            }
        }

        return redirect('/konsultasi')->with('error', "You don't have dokter access.");
    }
}
