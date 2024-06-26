<?php

namespace Database\Seeders\Auth;

use Domains\Auth\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\Traits\DisableForeignKeys;

class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::firstOrCreate([
            'name' => 'John Doe',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'active' => true,
            'account_type' => 'Staff'
        ]);

        User::firstOrCreate([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'active' => true,
            'account_type' => 'Staff'
        ]);

        $this->enableForeignkeys();
    }
}
