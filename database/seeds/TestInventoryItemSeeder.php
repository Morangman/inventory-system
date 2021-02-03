<?php

declare(strict_types = 1);

use App\Models\InventoryItem;
use Illuminate\Database\Seeder;

/**
 * Class TestInventoryItemSeeder
 */
class TestInventoryItemSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        factory(InventoryItem::class, 10)->create();
    }
}
