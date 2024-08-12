<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et s'il a un rôle d'administrateur
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Si l'utilisateur n'est pas un administrateur, rediriger ou retourner une réponse 403
        return redirect('/unauthorized')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }
}

