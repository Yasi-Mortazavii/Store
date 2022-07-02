<?php

use Faker\Generator as Faker;

$factory->define(App\product::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'price' => $faker->randomNumber(4),
        'weight' => $faker->randomNumber(3),
        'description' => $faker->sentence(10)
    ];
});
