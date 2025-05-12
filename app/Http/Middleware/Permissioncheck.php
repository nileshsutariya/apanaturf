<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Permissioncheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $currentRoute = $request->route()->getName(); 

        $hasPermission = Permission::where('user_id', $user->id)
            ->where('name', $currentRoute)
            ->where('status', 1)
            ->exists();

        if (!$hasPermission) {
            return redirect()->route('unauthorized');
        }

        return $next($request);
    }
}
