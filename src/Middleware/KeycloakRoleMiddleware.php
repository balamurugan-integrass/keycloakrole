<?php

namespace Bala\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeycloakRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $role
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$role) {
            return response()->json(['message' => 'Add role in keycloak role middleware'], 500);
        }

        if (!Auth::check()) {
            return response()->json(['message' => 'Not Authenticated'], 400);
        }

        if (!env('KEYCLOAK_APP_CLIENT')) {
            return response()->json(['message' => 'KEYCLOAK_APP_CLIENT is empty'], 500);
        }

        $roles = explode('|', $role);
        foreach ($roles as $r) {
            if (Auth::hasRole(env('KEYCLOAK_APP_CLIENT'), $r)) {
                return $next($request);
            }
        }
        return response()->json(['message' => 'Unauthorized user'], 422);
    }
}
