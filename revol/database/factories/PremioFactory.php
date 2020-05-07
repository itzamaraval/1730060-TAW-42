<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Premio;
use Faker\Generator as Faker;

$factory->define(Premio::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
    ];
});
