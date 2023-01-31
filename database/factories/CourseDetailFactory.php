<?php

/** @var Factory $factory */

use App\Models\CourseDetail;
use Faker\Generator as Faker;

$factory->define(CourseDetail::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(15),
        'content' => $faker->realText(20),
        'description' => $faker->realText(30),
        'video' => 'https://www.youtube.com/embed/UGpod7WlwJ0',
    ];
});
