<?php

namespace App\Http\Middleware;

use App\Service\ResponseOutput\ResponseOutput;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, $next, $guard = null)
    {
        
        if (!Auth::check()) {
            try {
                JWTAuth::parseToken()->authenticate();
            } catch (\Exception $e) {
                if ($e instanceof TokenExpiredException) {
                    $newToken = Auth::refresh();
                    return (new ResponseOutput(false, ['new_token' => $newToken], 200))->jsonOutput();
                } else if ($e instanceof TokenInvalidException) {
                    return response()->json(['success' => 'invalido'], 401);
                } 
                
                return response()->json(['success' => false], 401);
            }
        }

        return $next($request);
    }
}
