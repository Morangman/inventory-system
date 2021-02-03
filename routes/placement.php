<?php

declare(strict_types = 1);

Route::get('/', [
    'as' => '.index',
    'uses' => 'PlacementController@index',
]);

Route::get('create', [
    'as' => '.create',
    'uses' => 'PlacementController@create',
]);

Route::post('/', [
    'as' => '.store',
    'uses' => 'PlacementController@store',
]);

Route::get('{placement}/edit', [
    'as' => '.edit',
    'uses' => 'PlacementController@edit',
]);

Route::patch('{placement}', [
    'as' => '.update',
    'uses' => 'PlacementController@update',
]);

Route::delete('{placement}', [
    'as' => '.destroy',
    'uses' => 'PlacementController@destroy',
]);

Route::get('list', [
    'as' => '.list',
    'uses' => 'PlacementController@list',
]);
