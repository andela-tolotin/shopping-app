<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class IsBuyerMiddleware
{
    /**
     * The ADMIN role
     *
     * @var ISADMIN
     */
    const ISBUYER = 'BUYER';

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

        if ($user->role->name == self::ISBUYER) {
            return $next($request);
        }

        abort(401);
        
    }
}
