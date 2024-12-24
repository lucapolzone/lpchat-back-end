<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // Verifica se la richiesta è un'API
            if ($request->is('api/*')) {
                // return route('api.login'); // Assicurati di definire una rotta nominata 'api.login' nelle rotte API
                return null;
            }

            // return null; // Rotta di login per le richieste 
            return route('login'); // Reindirizza per le richieste web
        }
    }
}
