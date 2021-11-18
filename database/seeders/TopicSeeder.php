<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domains\Course\Models\Level;
use Domains\Course\Models\Topic;
use Domains\Course\Models\Course;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::all()->each(function ($course) {
            $course->levels->each(function ($level) {
                collect([
                    [
                        'title' => 'Laravel',
                        'excerpt' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern',
                        'content' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern. Laravel is intended for the development of web applications following the model–view–controller (MVC) architectural pattern, and its main components are commonly referred to as controllers, models, and views. Laravel is based on Symfony, a full-stack framework for PHP, and its components are commonly referred to as controllers, models, and views. Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern. Laravel is intended for the development of web applications following the model–view–controller (MVC) architectural pattern, and its main components are commonly referred to as controllers, models, and views. Laravel is based on Symfony, a full-stack framework for PHP, and its components are commonly referred to as controllers, models, and views.',
                    ],
                    [
                        'title' => 'Vue.js',
                        'excerpt' => 'Vue.js is a JavaScript library for building user interfaces',
                        'content' => 'Vue.js is a JavaScript library for building user interfaces. It is maintained by Evan You, and is designed to be incrementally adoptable. It is most commonly used as a single-page JavaScript framework, or as a runtime for building highly interactive web applications.',
                    ],
                    [
                        'title' => 'React.js',
                        'excerpt' => 'React is a JavaScript library for building user interfaces',
                        'content' => 'React is a JavaScript library for building user interfaces. It is maintained by Facebook, and is designed to be incrementally adoptable. It is most commonly used as a single-page JavaScript framework, or as a runtime for building highly interactive web applications.',
                    ]
                ])->each(function ($topic) use ($level) {
                    $last = Topic::latest('created_at')->first();
                    $level->topics()->create([
                        'title' => $topic['title'],
                        'excerpt' => $topic['excerpt'],
                        'content' => $topic['content'],
                        'previous_topic_id' => $last ? $last->id : null,
                    ]);
                });
            });
        });
    }
}
