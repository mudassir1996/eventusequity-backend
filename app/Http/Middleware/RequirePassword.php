<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\RequirePassword as MiddlewareRequirePassword;
use Illuminate\Http\Request;

class RequirePassword extends MiddlewareRequirePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return mixed
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (auth()->user()->is_secure) {

            if ($this->shouldConfirmPassword($request)) {
                if ($request->expectsJson()) {
                    return $this->responseFactory->json([
                        'message' => 'Password confirmation required.',
                    ], 423);
                }

                return $this->responseFactory->redirectGuest(
                    $this->urlGenerator->route($redirectToRoute ?? 'password.confirm')
                );
            }
        }

        return $next($request);
    }
}
