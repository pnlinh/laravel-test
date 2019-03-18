<?php

use Faker\Generator as Faker;

$factory->define(App\Purchase::class, function (Faker $faker) {
    return [
        'beverage_id' => $faker->randomDigit,
        'price' => $faker->numberBetween(100, 200),
    ];
});
