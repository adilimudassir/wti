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
            ],
            [
                'title' => 'Cryptocurrency Trading',
                'description' => 'Learn Cryptocurrency Trading',
                'cost' =>80000,
            ],
            [
                'title' => 'Stock Trading',
                'description' => 'Learn Stock Trading',
                'cost' =>60000,
            ]
        ])->each(fn ($course) => Course::firstOrCreate($course));
    }
}
