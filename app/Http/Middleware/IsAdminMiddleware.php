<?php

namespace App\Http\Middleware;

use User;
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
        $user = User::findOneById($request->get('id'));

        if ($user->role->name == self::ISADMIN) {
            return $next($request);
        }

        abort(401);
        
    }
}
