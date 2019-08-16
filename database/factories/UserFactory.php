<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'address_latitude' => $faker->latitude($min = -90, $max = 90),
        'address_longitude' => $faker->longitude($min = -180, $max = 180),
        'address_city' => $faker->city,
        'description' => $faker->realText($maxNbChars = 60, $indexSize = 2),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->unique()->password, // password
        'remember_token' => Str::random(10),
    ];
});
