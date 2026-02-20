<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Example middleware for checking user permissions
 * 
 * This is an example of how to create custom middleware
 * for checking permissions. However, Spatie provides built-in
 * middleware that you can use directly.
 * 
 * To use Spatie's built-in middleware, register them in your
 * app/Http/Kernel.php:
 * 
 * protected $middlewareAliases = [
 *     'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
 *     'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
 *     'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
 * ];
 */
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!auth()->user()->can($permission)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
