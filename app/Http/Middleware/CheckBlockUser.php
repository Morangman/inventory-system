<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

/**
 * Class CheckBlockUser
 *
 * @package App\Http\Middleware
 */
class CheckBlockUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->getAttribute('is_blocked')) {
            Auth::logout();
            Session::flash('status', 'Your account is blocked!');

            return Redirect::to('login');
        }

        return $next($request);
    }
}
