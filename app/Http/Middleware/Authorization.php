<?php

namespace App\Http\Middleware;

use Closure;

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

        $authorization = $request->getHeader('Authorization');

        if (! empty($authorization)) {
            $token = explode(' ', $authorization);
            $authorization = $token[1];
        }

        try {
            if (! empty($authorization) {
                $secretKey = env('SECRET_KEY');
                $jwt = json_decode($authorization, true);
                //decode the JWT using the key from config
                $decodedToken = JWT::decode($jwt['token'], $secretKey, ['HS512']);
                return $next($request);
            }
        } catch (Exception $e) {
            return $response->withJson(['message' => $e->getMessage()], 401);
        }
        return $response->withJson(['message' => 'User unauthorized due to invalid token'], 401);
    }
}
