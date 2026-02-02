<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (null === $request->user() || null === $request->user()->employer) {
            return redirect()->route('jobs.index')
                ->with('error', 'You need to register as an employer first');
        }

        return $next($request);
    }
}
