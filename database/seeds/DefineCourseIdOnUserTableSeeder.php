<?php

use Illuminate\Database\Seeder;

class DefineCourseIdOnUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->update(
            ['course_id' => '2']
        )->where('id');
    }
}
