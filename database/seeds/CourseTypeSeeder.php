<?php

use Illuminate\Database\Seeder;
use App\Models\CourseType;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseTypes = [
            [
                'name' => 'Word',
            ],
            [
                'name' => 'Excel',
            ],
            [
                'name' => 'Power Point',
            ]
        ];
        foreach ($courseTypes as $courseType) {
            CourseType::create($courseType);
        };
    }
}
