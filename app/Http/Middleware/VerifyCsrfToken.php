<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
        if($request->route()->named('logout'))
        {
            if(!Auth::check() || Auth::guard()->viaRemember())
            {
                $this->except[] = route('logout');
            }
        }

        return parent::handle($request, $next);
    }
}
