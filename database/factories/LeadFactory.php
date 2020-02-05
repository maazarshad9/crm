<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lead;
use Faker\Factory;
use Faker\Generator as Faker;
use Faker\create;

$factory->define(Lead::class, function (Faker $faker) {
	$faker = Factory::create('en_HK');
	return [
		'name' => $faker->name,
		'phone_number' => $faker->mobileNumber,
		'city' => $faker->city,
		'description' => $faker->realText($maxNbChars = 40, $indexSize = 2),
		'address' => $faker->address,
		'last_date' => $faker->dateTime()
	];
});
