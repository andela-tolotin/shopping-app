<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class IsAdminAndManagerMiddleware
{
    /**
     * The ADMIN role
     *
     * @var ISADMIN
     */
    const ISADMIN = 'ADMIN';

    /**
     * The Manager role.
     *
     * @var ISMANAGER
     */
    const ISMANAGER = 'MANAGER';

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

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

        if (is_null($user)) {
            return redirect()->guest('login');
        }

        if ($user->role->name === self::ISADMIN || $user->role->name === self::ISMANAGER ) {
            return $next($request);
        }

        abort(401);
        
    }
}
