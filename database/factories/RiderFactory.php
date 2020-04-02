<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rider;
use Faker\Generator as Faker;

$factory->define(Rider::class, function (Faker $faker) {
    return [
        'team_id' => factory(App\Team::class),
        'motorcycle_id' => factory(App\Motorcycle::class),
        'country_id' => factory(App\Country::class),
        'racing_number' => $faker->unique()->numberBetween(1,99),
        'age' => $faker->numberBetween(20,45)
    ];
});
