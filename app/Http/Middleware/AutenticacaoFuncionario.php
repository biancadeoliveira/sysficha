<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AutenticacaoFuncionario
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
        if (Auth::guard('web')->check()) {
            
            return $next($request);             

        } else {
            
            $result = "Faça login para acessar o sistema";
            return redirect()->route('login')->with('status', $result);

        }

        
    }
}
