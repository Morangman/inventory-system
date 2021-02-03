<?php

declare(strict_types = 1);

use App\Models\Category;
use Illuminate\Database\Seeder;

/**
 * Class TestCategorySeeder
 */
class TestCategorySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        factory(Category::class, 10)->create();
    }
}
