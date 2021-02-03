<?php

declare(strict_types = 1);

use App\Models\Status;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Status::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
