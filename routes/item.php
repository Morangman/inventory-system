<?php

declare(strict_types = 1);

Route::get('create', [
    'as' => '.create',
    'uses' => 'InventoryItemController@create',
]);

Route::post('/', [
    'as' => '.store',
    'uses' => 'InventoryItemController@store',
]);

Route::get('{item}/edit', [
    'as' => '.edit',
    'uses' => 'InventoryItemController@edit',
]);

Route::patch('{item}', [
    'as' => '.update',
    'uses' => 'InventoryItemController@update',
]);

Route::delete('{item}', [
    'as' => '.destroy',
    'uses' => 'InventoryItemController@destroy',
]);

Route::get('list', [
    'as' => '.list',
    'uses' => 'InventoryItemController@list',
]);
