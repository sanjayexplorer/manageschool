<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        dd($roles);
        
        // Check if the user is authenticated
        if (!Auth::check()) {
            return $this->unauthorizedResponse($request, 'User is not authenticated');
        }

        $user = Auth::user();

        // Check if the user has one of the required roles
        if (!in_array($user->role, $roles)) {
            return $this->unauthorizedResponse($request, 'You do not have the required role');
        }

        return $next($request);
    }

    /**
     * Return unauthorized response based on the request type (JSON for API, Redirect for Web).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $message
     * @return mixed
     */
    private function unauthorizedResponse($request, $message)
    {
        // For API requests, return a JSON response
        if ($request->expectsJson()) {
            return response()->json(['error' => $message], 403);
        }

        // For web requests, redirect with error message
        return redirect('/')->with('error', $message);
    }
}
