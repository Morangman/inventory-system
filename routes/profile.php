<?php

declare(strict_types = 1);

Route::get('{lang}/setlocale', [
    'as'   => '.setlocale',
    'uses' => 'ProfileController@setLocale',
]);
