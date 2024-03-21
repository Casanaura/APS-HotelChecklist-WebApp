<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRank
{
    public function handle($request, Closure $next, $rank)
    {
        if (Auth::check() && Auth::user()->rank_id == $rank) {
            return $next($request);
        }

        // Redirect to unauthorized page
        return redirect('/unauthorized');
    }
}
