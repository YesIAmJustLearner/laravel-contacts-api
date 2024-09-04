<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!auth()->check()) {
            return response()->json([
                'message' => 'Não autorizado. Você precisa estar autenticado para acessar este recurso.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
