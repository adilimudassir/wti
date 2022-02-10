<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domains\Course\Models\Course;

class CourseSeeder extends Seeder
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
                'title' => 'Forex Trading',
                'description' => 'Learn Forex Trading',
                'cost' =>50000,
                'duration' => '3 Month, Lifetime Mentorship',
                'outline' => 'Course Outline'
            ],
            [
                'title' => 'Cryptocurrency Trading',
                'description' => 'Learn Cryptocurrency Trading',
                'cost' =>80000,
                'duration' => '3 Month, Lifetime Mentorship',
                'outline' => 'Course Outline'
            ],
            [
                'title' => 'Stock Trading',
                'description' => 'Learn Stock Trading',
                'cost' =>60000,
                'duration' => '3 Month, Lifetime Mentorship',
                'outline' => 'Course Outline'
            ]
        ])->each(fn ($course) => Course::firstOrCreate($course));
    }
}
