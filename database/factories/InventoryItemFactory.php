<?php

declare(strict_types = 1);

use App\Models\Category;
use App\Models\InventoryItem;
use App\Models\Placement;
use App\Models\Status;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(InventoryItem::class, function (Faker $faker) {
    $category = Category::query()->inRandomOrder()->firstOrFail();
    $status = Status::query()->inRandomOrder()->firstOrFail();
    $placement = Placement::query()->inRandomOrder()->firstOrFail();

    return [
        'category_id' => $category->getKey(),
        'status_id' => $status->getKey(),
        'placement_id' => $placement->getKey(),
        'price' => $faker->randomFloat(2, 1, 100),
        'model' => $faker->word,
        'placement_comment' => $faker->sentence,
        'comment' => $faker->sentence,
        'purchased_at' => $faker->dateTime,
    ];
});
