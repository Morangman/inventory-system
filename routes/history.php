<?php

declare(strict_types = 1);

Route::get('/', [
    'as' => '.index',
    'uses' => 'InventoryItemHistoryController@index',
]);

Route::post('clear', [
    'as' => '.clear',
    'uses' => 'InventoryItemHistoryController@clear',
]);

Route::get('list', [
    'as' => '.list',
    'uses' => 'InventoryItemHistoryController@list',
]);
