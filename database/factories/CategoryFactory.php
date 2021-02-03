<?php

declare(strict_types = 1);

use App\Models\Category;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
