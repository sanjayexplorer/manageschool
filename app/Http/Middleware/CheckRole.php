<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        Log::info('CheckRole Middleware executing...', ['roles' => $roles]);

        if (!Auth::check()) {
            return $this->unauthorizedResponse($request, 'User is not authenticated');
        }

        $user = Auth::user();
        $userRole = $user->roles->first()?->name;

        Log::info('Authenticated user role: ' . $userRole);

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return $this->redirectToOwnDashboard($request, $userRole);
    }

    private function redirectToOwnDashboard($request, $role)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'Unauthorized role. Expected one of allowed roles.',
                'user_role' => $role,
            ], 403);
        }

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'teacher':
                return redirect()->route('teacher.dashboard');
            case 'principal':
                return redirect()->route('principal.dashboard');
            default:
                Auth::logout();
                return redirect()->route('welcome')->with('error', 'Unauthorized role.');
        }
    }

    private function unauthorizedResponse($request, $message)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => $message], 403);
        }

        return redirect()->route('welcome')->with('error', $message);
    }
}
