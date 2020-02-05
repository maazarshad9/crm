<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Sale;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->defineAs(Sale::class, 'installments', function (Faker $faker) {
	$paid_amount = $faker->numberBetween($min = 200000, $max = 500000);
		$total_amount = $faker->numberBetween($min = 400000, $max = 900000);
		$pending_amount = $total_amount - $paid_amount;

		$payment_recurrence = 1;
		$installment_duration = $faker->numberBetween($min = 1, $max = 7);
		$months = $installment_duration * 12;

		$monthly_payable = $pending_amount/$months;
	return [
			'total_amount' => $total_amount,
			'paid_amount' => $paid_amount,
			'pending_amount' => $pending_amount,
			'installment_active' => true,
			'payment_recurrence' => $payment_recurrence,
			'installment_duration' => $installment_duration,
			'monthly_payable' => $monthly_payable

	];
});
