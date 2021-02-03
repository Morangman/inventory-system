<?php

declare(strict_types = 1);

use App\Models\Status;
use Illuminate\Database\Seeder;

/**
 * Class TestStatusSeeder
 */
class TestStatusSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        factory(Status::class, 10)->create();
    }
}
