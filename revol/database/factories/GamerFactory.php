<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gamer;
use Faker\Generator as Faker;

$factory->define(Gamer::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
