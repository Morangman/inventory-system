<?php

declare(strict_types = 1);

Route::get('/', [
    'as' => '.index',
    'uses' => 'CategoryController@index',
]);

Route::get('create', [
    'as' => '.create',
    'uses' => 'CategoryController@create',
]);

Route::post('/', [
    'as' => '.store',
    'uses' => 'CategoryController@store',
]);

Route::get('{category}/edit', [
    'as' => '.edit',
    'uses' => 'CategoryController@edit',
]);

Route::patch('{category}', [
    'as' => '.update',
    'uses' => 'CategoryController@update',
]);

Route::delete('{category}', [
    'as' => '.destroy',
    'uses' => 'CategoryController@destroy',
]);

Route::get('list', [
    'as' => '.list',
    'uses' => 'CategoryController@list',
]);
