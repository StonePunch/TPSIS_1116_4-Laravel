<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            ['name' => 'Student'],
            ['name' => 'Teacher'],
            ['name' => 'Admin']
        ]);
    }
}
