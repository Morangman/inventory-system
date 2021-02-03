<?php

declare(strict_types = 1);

Route::get('/', [
    'as' => '.index',
    'uses' => 'UserController@index',
]);

Route::get('create', [
    'as' => '.create',
    'uses' => 'UserController@create',
]);

Route::post('/', [
    'as' => '.store',
    'uses' => 'UserController@store',
]);

Route::get('{user}/edit', [
    'as' => '.edit',
    'uses' => 'UserController@edit',
]);

Route::patch('{user}', [
    'as' => '.update',
    'uses' => 'UserController@update',
]);

Route::delete('{user}', [
    'as' => '.destroy',
    'uses' => 'UserController@destroy',
]);

Route::get('list', [
    'as' => '.list',
    'uses' => 'UserController@list',
]);

