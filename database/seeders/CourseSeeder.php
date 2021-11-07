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
                'description' => 'Learn Forex Trading'
            ],
            [
                'title' => 'Cryptocurrency Trading',
                'description' => 'Learn Cryptocurrency Trading'
            ],
            [
                'title' => 'Stock Trading',
                'description' => 'Learn Stock Trading'
            ]
        ])->each(fn ($course) => Course::firstOrCreate($course));
    }
}
