<?php

declare(strict_types = 1);

Route::get('/', [
    'as' => '.index',
    'uses' => 'StatusController@index',
]);

Route::get('create', [
    'as' => '.create',
    'uses' => 'StatusController@create',
]);

Route::post('/', [
    'as' => '.store',
    'uses' => 'StatusController@store',
]);

Route::get('{status}/edit', [
    'as' => '.edit',
    'uses' => 'StatusController@edit',
]);

Route::patch('{status}', [
    'as' => '.update',
    'uses' => 'StatusController@update',
]);

Route::delete('{status}', [
    'as' => '.destroy',
    'uses' => 'StatusController@destroy',
]);

Route::get('list', [
    'as' => '.list',
    'uses' => 'StatusController@list',
]);
