<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'order'         => strtoupper($faker->randomLetter).''.strtoupper($faker->randomLetter),
        'name'          => $faker->name,
        'outstanding'   => rand(0,1),
        'description'   => $faker->realText(rand(100,200))
    ];
});
