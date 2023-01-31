<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/** @var Factory $factory */
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
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('123456'), // secret
        'phone' => '09' . implode('', $faker->randomElements(range(1, 9), 8)),
    ];
});
