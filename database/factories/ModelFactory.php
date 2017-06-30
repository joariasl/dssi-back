<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Person::class, function (Faker\Generator $faker) {
    return [
        'rut' => $faker->numberBetween($min = 10000000, $max = 20000000),
        'dv' => $faker->randomDigitNotNull,
        'name' => $faker->name,
        'lastname' => $faker->lastName
    ];
});

$factory->define(App\Property::class, function (Faker\Generator $faker) {
    return [
        'id' => strtoupper(str_random(3)),
        'name' => $faker->city
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
