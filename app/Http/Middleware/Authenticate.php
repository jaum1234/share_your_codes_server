<?php

namespace App\Http\Middleware;

use App\Service\ResponseOutput\JsonResponseOutput;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
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
        $responseOutput = new JsonResponseOutput();
        
        if (!Auth::check()) {
            try {
                JWTAuth::parseToken()->authenticate();
            } catch (TokenExpiredException $e) {
                
                $newToken = Auth::refresh();

                return $responseOutput->set(
                    false,
                    ['new_token' => $newToken],
                    "Token expirou. Um novo foi disponibilizado.",
                    200
                );

            } catch (TokenInvalidException $e) {
                return $responseOutput->set(
                    false,
                    [],
                    "Token inválido.",
                    401
                );
            } catch (TokenBlacklistedException $e) { 
                return $responseOutput->set(
                    false,
                    [],
                    "Token foi adicionado a lista negra.",
                    401
                );
            }    
            return $responseOutput->set(false, [], "Nao autorizado", 401);
        }

        return $next($request);
    }
}
