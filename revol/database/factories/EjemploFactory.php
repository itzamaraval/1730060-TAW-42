<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ejemplo;
use Faker\Generator as Faker;

$factory->define(Ejemplo::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
