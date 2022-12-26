<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {
    return [
        'order' => strtoupper($faker->randomLetter).''.strtoupper($faker->randomLetter),
        'name'  => $faker->colorName,
        'code'  => rand(1, 999) . "-" . strtoupper($faker->randomLetter),
        'color' => 'images/color/peBXDRWjPFFPYDQFYdwCmZroMFl15SLd7J9WTEyC.png'
    ];
});
