<?php

namespace App\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = null;

        $authorization = $request->header('Authorization');

        if (! empty($authorization)) {
            $token = explode(' ', $authorization);
            $authorization = $token[1];
        }

        try {
            if (! empty($authorization)) {
                $secretKey = env('SECRET_KEY');
                //decode the JWT using the key from config
                JWT::decode($authorization, $secretKey, ['HS512']);
                return $next($request);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
        return response()->json(['message' => 'User unauthorized due to invalid token'], 401);
    }
}
