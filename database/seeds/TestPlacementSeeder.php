<?php

declare(strict_types = 1);

use App\Models\Placement;
use Illuminate\Database\Seeder;

/**
 * Class TestPlacementSeeder
 */
class TestPlacementSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        factory(Placement::class, 10)->create();
    }
}
