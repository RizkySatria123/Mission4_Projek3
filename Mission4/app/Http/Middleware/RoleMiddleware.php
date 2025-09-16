<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = $request->session()->get('user_role');
        if(!$userRole){
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        if($userRole !== $role){
            abort(403, 'Unauthorized action');
        }
        return $next($request);
    }
}
