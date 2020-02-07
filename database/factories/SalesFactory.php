<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
	
	$total_amount = $faker->numberBetween($min = 10000, $max = 20000);
	$paid_amount = $faker->numberBetween($min = 5000, $max = 15000);
	$pending_amount = $total_amount - $paid_amount;

    return [
        'total_amount' => $total_amount,
        'paid_amount' => $paid_amount,
        'pending_amount' => $pending_amount
    ];
});
