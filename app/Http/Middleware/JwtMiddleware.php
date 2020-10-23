<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
        // try {
        //     $user = JWTAuth::parseToken()->authenticate();
        // }
        // // catch (TokenExpiredException $e){
        // //     return response()->json(['message'=>'1. TokenExpiredException '.$e->getMessage()], 400);
        // // }
        // // catch (TokenInvalidException $e){
        // //     return response()->json(['message'=>'2. TokenInvalidException '.$e->getMessage()], 400);
        // // }
        // catch (JWTException $e){
        //     return response()->json(['message'=>'3. JWTException 4 '.$e->getMessage()], 400);
        //     // return $e->getMessage();
        // }
        // return $next($request);
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                // return response()->json(['status' => 'Token is Expired']);
                return response(view('login'));
            }else{
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
