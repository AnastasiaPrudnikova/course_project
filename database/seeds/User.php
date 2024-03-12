<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('user'),
                'role' => 'user'
            ],
        ]);
    }
}
