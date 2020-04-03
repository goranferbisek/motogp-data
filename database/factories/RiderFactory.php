<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rider;
use Faker\Generator as Faker;

$factory->define(Rider::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->Lastname,
        'team_id' => factory(App\Team::class),
        'bike_id' => factory(App\Bike::class),
        'country_id' => factory(App\Country::class),
        'racing_number' => $faker->unique()->numberBetween(1,99),
        'age' => $faker->numberBetween(20,45)
    ];
});
