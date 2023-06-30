<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
        	'name' => 'Admin',
        	'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'role' => 0
        ];
        $user = \App\Models\User::create($userData);

    }
}
