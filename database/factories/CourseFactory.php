<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Course;
use App\Models\CourseType;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'course_type_id'=>$faker->randomElement(CourseType::all()->pluck('id')->toArray()),
        'price'=>$faker->numberBetween(100000, 500000),
    ];
});
