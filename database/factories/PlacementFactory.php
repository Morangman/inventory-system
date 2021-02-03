<?php

declare(strict_types = 1);

use App\Models\Placement;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Placement::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
