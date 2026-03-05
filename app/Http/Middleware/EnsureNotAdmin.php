<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureNotAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->role === 'admin') {
            return redirect('/admin');
        }

        return $next($request);
    }
}
