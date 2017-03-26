<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    protected $auth;

    public function __construct(Guard $auth)
  	{
  		$this->auth = $auth;
  	}

    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->check()) {
            return new RedirectReponse(url('/home'));
        }
        return $next($request);
    }
}
