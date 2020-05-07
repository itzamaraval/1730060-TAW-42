<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consola;
use Faker\Generator as Faker;

$factory->define(Consola::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
