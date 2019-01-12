<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(8),
        'price' => $faker->numberBetween(1,20000),
        'quantity' => $faker->randomDigit
    ];
});
