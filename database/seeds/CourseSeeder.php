<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\CourseDetail;

use function PHPUnit\Framework\callback;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Course::class, config('seeder.course'))->create()->each(function ($course, $index) {
            factory(CourseDetail::class, config('seeder.course_detail'))->create([
                'course_id' => $course->id,
            ]);
        });
    }
}
