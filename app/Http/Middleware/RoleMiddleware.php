<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();
        if ($user === null) {
            return abort(403);
        }

        if (!$request->user()->hasRole($role)) {
            return abort(403);
        }

        if ($role === 'agent' && $user->insurance_company_id === null) {
            return abort(403, 'Need join to insurance company');
        }

        return $next($request);
    }
}
