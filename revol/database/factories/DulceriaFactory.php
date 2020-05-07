<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dulceria;
use Faker\Generator as Faker;

$factory->define(Dulceria::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
