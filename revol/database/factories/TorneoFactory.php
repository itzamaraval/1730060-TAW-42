<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Torneo;
use Faker\Generator as Faker;

$factory->define(Torneo::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
