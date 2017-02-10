<?php

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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'type' => 'admin',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('users')->insert([
            'name' => 'george',
            'email' => 'george@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'user',
            'created_at' => DB::raw('NOW()')
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('user'),
            'type' => 'user',
            'created_at' => DB::raw('NOW()')
        ]);

    }
}
