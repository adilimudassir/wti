<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\Auth\UserRoleSeeder;
use Database\Seeders\Auth\UserTableSeeder;
use Database\Seeders\Auth\PermissionRoleTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(LevelSeeder::class);
        if (config('app.env') === 'local') {
            $this->call(TopicSeeder::class);
        }
    }
}
