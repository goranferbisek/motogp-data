<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Motorcycle;
use Faker\Generator as Faker;

$factory->define(Motorcycle::class, function (Faker $faker) {
    return [
        'make' => ucfirst($faker->safeColorName) . ' ' . $faker->lastName
    ];
});
