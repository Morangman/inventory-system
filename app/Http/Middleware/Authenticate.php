<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\URL;

/**
 * Class Authenticate
 *
 * @package App\Http\Middleware
 */
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param mixed $request
     *
     * @return string
     */
    protected function redirectTo($request): string
    {
        if (!$request->expectsJson()) {
            return URL::route('login');
        }
    }
}
