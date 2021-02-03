<?php

declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ModelObserverServiceProvider
 *
 * @package App\Providers
 */
class ModelObserverServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        \App\Models\InventoryItem::observe(\App\Observers\InventoryItemObserver::class);
    }
}
