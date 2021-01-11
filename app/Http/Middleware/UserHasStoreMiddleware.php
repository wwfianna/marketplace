<?php

namespace App\Http\Middleware;

use Closure;

class UserHasStoreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->count() + 1 == 1) {
            flash('Loja já cadastrada para este usuário')->warning();
            return redirect()->route('admin.stores.index');
        }

        return $next($request);
    }
}
