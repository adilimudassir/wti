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
                'title' => 'Beginner',
                'description' => 'This is the first level of the course',
            ],
            [
                'name' => '200',
                'title' => 'Intermediate',
                'description' => 'This is the second level of the course',
            ],
            [
                'name' => '300',
                'title' => 'Advanced',
                'description' => 'This is the third level of the course',
            ],
            [
                'name' => '400',
                'title' => 'Expert',
                'description' => 'This is the fourth level of the course',
            ],
            [
                'name' => '500',
                'title' => 'Master',
                'description' => 'This is the fifth level of the course',
            ],
            [
                'name' => '600',
                'title' => 'Grandmaster',
                'description' => 'This is the sixth level of the course',
            ],
            [
                'name' => '700',
                'title' => 'Challenger',
                'description' => 'This is the seventh level of the course',
            ],
        ])->each(function ($level) {
            Course::all()->each(function ($course) use ($level) {
                Level::create([
                    'course_id' => $course->id,
                    'name' => $level['name'],
                    'title' => $level['title'],
                    'description' => $level['description']
                ]);
            });
        });
    }
}
