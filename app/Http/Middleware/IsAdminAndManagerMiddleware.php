<?php

namespace App\Http\Middleware;

use Auth;
use App\User;
use Closure;

class IsAdminAndManagerMiddleware
{
    const ISADMIN = 'ADMIN';
    const ISMANAGER = 'MANAGER';
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

        if ($user->role->name === self::ISADMIN || $user->role->name === self::ISMANAGER ) {
            return $next($request);
        }

        abort(401);
        
    }
}
