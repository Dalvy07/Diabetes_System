<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Проверим, авторизован ли вообще пользователь
        if (!Auth::check()) {
            // Если не авторизован — можно редиректить на login или вернуть 403
            return redirect()->route('login');
        }

        // Если пользователь авторизован, проверяем его роль
        // Предположим, у пользователя поле 'role' в таблице 'users'
        $user = Auth::user();
        if ($user->role !== $role) {
            // Если роль не совпадает, можно выбросить 403 (Forbidden)
            abort(403, 'Доступ запрещён. Недостаточно прав.');
        }

        return $next($request);
    }
}
