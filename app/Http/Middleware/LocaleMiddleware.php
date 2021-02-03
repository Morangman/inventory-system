<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use App;
use Auth;
use Closure;
use Illuminate\Http\Request;

/**
 * Class LocaleMiddleware
 *
 * @package App\Http\Middleware
 */
class LocaleMiddleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $locale = Auth::user()->getAttribute('locale');
            if ($locale) {
                App::setLocale($locale);
            }
        }

        return $next($request);
    }
}
