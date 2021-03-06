<?php

namespace ABAS\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/logout',
        '/temporales/novedad/*',
        '/solicitud',
        '/show/comisiones',
        '/crear-cuenta',
        '/login-cliente',
        '/documents*',
        '/update-password/cliente'
    ];
}
