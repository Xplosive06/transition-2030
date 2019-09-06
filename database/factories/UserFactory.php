<?php

/** @var Factory $factory */
use App\Models\User;
use Illuminate\Database\Eloquent\Factory;
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
    $userName = $faker->name;
    return [
        'username' => $userName,
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'address_latitude' => $faker->latitude($min = 43.650, $max = 43.908),
        'address_longitude' => $faker->longitude($min = 6.60, $max = 7.60),
        'address_city' => $faker->city,
        'description' => $faker->realText($maxNbChars = 60, $indexSize = 2),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->unique()->password, // password,
        'remember_token' => Str::random(10),
        'avatar' => $userName . 'jpg',
    ];
});
