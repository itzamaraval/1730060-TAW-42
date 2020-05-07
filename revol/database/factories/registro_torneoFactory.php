<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\registro_torneo;
use Faker\Generator as Faker;

$factory->define(registro_torneo::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
