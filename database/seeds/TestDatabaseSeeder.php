<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

/**
 * Class TestDatabaseSeeder
 */
class TestDatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $this->call(TestUserSeeder::class);
        $this->call(TestCategorySeeder::class);
        $this->call(TestStatusSeeder::class);
        $this->call(TestPlacementSeeder::class);
        $this->call(TestInventoryItemSeeder::class);
    }
}
