<?php

declare(strict_types = 1);

namespace App\Providers;

use App\Models\Category;
use App\Models\InventoryItem;
use App\Models\InventoryItemHistory;
use App\Models\Placement;
use App\Models\Status;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 *
 * @package App\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * @return void
     */
    public function boot()
    {
        $this->mapPatterns();
        $this->mapModels();

        parent::boot();
    }

    /**
     * @return void
     */
    public function map(): void
    {
        $this->mapWebRoutes();
    }

    /**
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group($this->app->basePath().'/routes/web.php');
    }

    /**
     * @return void
     */
    protected function mapPatterns(): void
    {
        Route::pattern('category', '[0-9]+');
        Route::pattern('item', '[a-z-A-Z0-9-]+');
        Route::pattern('history', '[0-9]+');
        Route::pattern('placement', '[0-9]+');
        Route::pattern('status', '[0-9]+');
    }

    /**
     * @return void
     */
    protected function mapModels(): void
    {
        Route::model('category', Category::class);
        Route::model('item', InventoryItem::class);
        Route::model('history', InventoryItemHistory::class);
        Route::model('placement', Placement::class);
        Route::model('status', Status::class);
    }
}
