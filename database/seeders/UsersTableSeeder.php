<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::firstOrCreate([
            'name'     => 'admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('admin1234'),
        ]);
    }
}
