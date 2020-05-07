<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Season;
use Faker\Generator as Faker;

$factory->define(Season::class, function (Faker $faker) {
    return [
        'year' => $faker->unique()->numberBetween(2010,2020)
    ];
});
