<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domains\Course\Models\Level;
use Domains\Course\Models\Course;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => '100',
                'title' => 'Beginners Course',
                'description' => 'This is the first level of the course',
            ],
            [
                'name' => '200',
                'title' => 'Intermediate Course',
                'description' => 'This is the second level of the course',
            ],
            [
                'name' => '300',
                'title' => 'Advanced Course',
                'description' => 'This is the third level of the course',
            ],
            [
                'name' => '400',
                'title' => 'Mastery Class',
                'description' => 'This is the fourth level of the course',
            ],
        ])->each(function ($level) {
            $course = Course::whereSlug('forex-trading')->first();
            Level::create([
                'course_id' => $course->id,
                'name' => $level['name'],
                'title' => $level['title'],
                'description' => $level['description']
            ]);
        });
    }
}
