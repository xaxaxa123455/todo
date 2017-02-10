<?php

use Illuminate\Database\Seeder;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'name' => 'OnCallCentral',
            'user_id' => 3,
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('lists')->insert([
            'name' => 'AikiDesk',
            'user_id' => 3,
            'created_at' => DB::raw('NOW()'),
        ]);
    }
}
