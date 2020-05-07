<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Juego;
use Faker\Generator as Faker;

$factory->define(Juego::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
