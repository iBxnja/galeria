<?php
#responsable de verificar si un usuario está autenticado antes de permitir el
#acceso a una ruta o acción específica. Si un usuario no está autenticado, el middleware
#puede redirigir al usuario a la página de inicio de sesión.

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
        if (! $request->expectsJson()) {
            return route('login.index');// Redirige al login si el usuario no está autenticado
        }
    }
}
