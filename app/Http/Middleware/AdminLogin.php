<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isEmpty;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector|mixed|Response
     */
    public function handle(Request $request, Closure $next)
    {

        if (!empty(checkUserLogin()) && (checkUserLogin()->is_admin)) {
            return $next($request);
        }
        abort(404);

    }
}
