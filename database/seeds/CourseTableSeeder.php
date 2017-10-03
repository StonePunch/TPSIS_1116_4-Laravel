<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            ['name' => 'English', 'description' => 'English basics', 'duration' => '50 hours', 'start_date' => '2017-10-10', 'teacher_id' => '2'],
            ['name' => 'French', 'description' => 'French basics', 'duration' => '75 hours', 'start_date' => '2017-11-10', 'teacher_id' => '3'],
            ['name' => 'German', 'description' => 'German basics', 'duration' => '100 hours', 'start_date' => '2017-12-10', 'teacher_id' => '4'],
            ['name' => 'C programming language', 'description' => 'C basics', 'duration' => '60 hours', 'start_date' => '2018-01-10', 'teacher_id' => '5'],
            ['name' => 'C++ programming language', 'description' => 'C++ basics', 'duration' => '80 hours', 'start_date' => '2018-02-20', 'teacher_id' => '6'],
            ['name' => 'C# programming language', 'description' => 'C# basics', 'duration' => '100 hours', 'start_date' => '2018-03-30', 'teacher_id' => '7'],
            ['name' => 'PHP programming language', 'description' => 'PHP basics', 'duration' => '120 hours', 'start_date' => '2018-04-10', 'teacher_id' => '8'],
            ['name' => 'Visual Basic programming language', 'description' => 'Visual Basic basics', 'duration' => '90 hours', 'start_date' => '2018-05-10', 'teacher_id' => '9']
        ]);
    }
}