<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Namshi\JOSE\JWS;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    public function handle($request, Closure $next)
    {
        try {
            $user = FacadesJWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['Estado' => 'El token es invalido']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['Estado' => 'El token ha expirado']);
            }else{
                return response()->json(['Estado' => 'Token no encontrado']);
            }
        }
        return $next($request);
    }
}