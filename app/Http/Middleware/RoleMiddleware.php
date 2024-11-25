<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles  // Accept multiple roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Debugging to confirm middleware invocation
        \Log::info('Middleware invoked: ', [
            'roles_required' => $roles,
            'user_role' => Auth::check() ? Auth::user()->role : 'Guest',
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            abort(403, 'You must be logged in to access this page.');
        }

        // Check if the user's role matches any of the allowed roles
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
