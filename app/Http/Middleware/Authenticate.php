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

     public function handle($request, \Closure $next, ...$guards) {
        \Log::channel('test_debug')->debug("Authenticate: " . "function handle");
        $this->authenticate($request, $guards);
        return $next($request);
    }

    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
    }
}
