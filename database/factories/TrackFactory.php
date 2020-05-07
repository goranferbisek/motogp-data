<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use App\Track;
use Faker\Generator as Faker;

$factory->define(Track::class, function (Faker $faker) {
    return [
        'country_id' => factory(Country::class),
        'name' => $faker->state .' raceway' . ' ' . $faker->country,
        'length' => $faker->numberBetween(3500, 4500)
    ];
});
