<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wallet;
use Faker\Generator as Faker; //generate fake data

$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'money' => $faker->numberBetween($min=500, $max=900)
    ];
});
