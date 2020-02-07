<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement($array = array ('house','flat','bunglow')),
        'address' => $faker->address,
        'city' => $faker->city,
        'buying_price' => $faker->numberBetween($min = 2000000, $max = 5000000),
        'selling_price' => $faker->numberBetween($min = 4000000, $max = 9000000)
    ];
});
