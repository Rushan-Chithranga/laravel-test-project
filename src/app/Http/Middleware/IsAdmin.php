<?php

namespace App\Http\Middleware;

use App\Constants\RoleTypeConstants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role_id ==  RoleTypeConstants::ADMIN) {
            return $next($request);
        }
        return redirect()->route('customer.dashboard');
    }
}
