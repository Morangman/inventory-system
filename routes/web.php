<?php

declare(strict_types = 1);

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'InventoryItemController@index',
    ]);

    Route::group(
        ['prefix' => 'item', 'as' => 'item'],
        __DIR__.'/item.php'
    );

    Route::group(
        ['prefix' => 'profile', 'as' => 'profile'],
        __DIR__.'/profile.php'
    );

    Route::group(
        ['prefix' => 'category', 'as' => 'category'],
        __DIR__.'/category.php'
    );

    Route::group(
        ['prefix' => 'status', 'as' => 'status'],
        __DIR__.'/status.php'
    );

    Route::group(
        ['prefix' => 'placement', 'as' => 'placement'],
        __DIR__.'/placement.php'
    );

    Route::group(
        ['prefix' => 'history', 'as' => 'history'],
        __DIR__.'/history.php'
    );
});

Route::group(['middleware' => 'admin'], function () {
    Route::group(
        ['prefix' => 'user', 'as' => 'user'],
        __DIR__.'/user.php'
    );
});
