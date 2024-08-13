<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->is_type == 1) {
            // L'utilisateur est un administrateur
            return redirect()->route('admin.dashboard')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page');

        } elseif ($user->is_type == 2) {
            //l'utilisateur est un bachelier
            return $next($request);

        } else {
            // L'utilisateur n'a aucun des rôles spécifiés
            return redirect('/')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page');
        }
    }
}
