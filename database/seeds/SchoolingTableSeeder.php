<?php

use Illuminate\Database\Seeder;

class SchoolingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schooling')->insert([
            ['level' => 3, 'description' => 'High School'],
            ['level' => 4, 'description' => 'Technological Specialization'],
            ['level' => 5, 'description' => 'Technical Degree'],
            ['level' => 6, 'description' => "Bachelor's Degree"],
            ['level' => 7, 'description' => "Master's Degree"],
            ['level' => 8, 'description' => 'Phd']
        ]);
    }
}
