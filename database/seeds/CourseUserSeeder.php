<?php

use App\Models\Course;
use Illuminate\Database\Seeder;
use App\Models\User;


class CourseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        User::all()->random(config('seeder.user_course'))->each(function ($user) use ($courses) {
            $courseIds = $courses->random(config('seeder.course_user'))->pluck('id')->reduce(function ($carry, $item) {
                $carry[$item] = [
                    'status' => random_int(0, 4),
                    'steps' => '',
                    'progress' => 0
                ];

                return $carry;
            });
            $user->courses()->sync($courseIds);
        });
    }
}
