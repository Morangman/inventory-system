<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use URL;

/**
 * Class ProfileController
 *
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * @param string $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLocale(string $locale): RedirectResponse
    {
        $user = Auth::user();
        $user->setAttribute('locale', $locale);
        $user->save();

        return new RedirectResponse(URL::previous(), 302);
    }
}
