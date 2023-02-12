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
        foreach (range(1, config('seeder.course')) as $i) {
            $course =  factory(Course::class)
                ->create([
                    'name' => 'Khóa học số ' . $i,
                ]);
            foreach (range(1, rand(3, config('seeder.course_detail'))) as $j) {
                factory(CourseDetail::class)->create([
                    'name' => 'Bài học số ' . $j,
                    'course_id' => $course->id
                ]);
            }
        }
    }
}
