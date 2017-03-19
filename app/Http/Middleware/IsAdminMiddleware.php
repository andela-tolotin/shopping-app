<?php

namespace App\Http\Middleware;

use Auth;
use App\User;
use Closure;

class IsAdminMiddleware
{
    const ISADMIN = 'ADMIN';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->role->name == self::ISADMIN) {
            return $next($request);
        }

        abort(401);
        
    }
}
