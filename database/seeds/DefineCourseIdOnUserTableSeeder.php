<?php

use App\User;
use App\Course;
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
        $user = User::whereEmail('Maria@courses.pt')->first();
        $user->course_id = Course::whereName('English')->first()->id;
        $user->save();
        $user = User::whereEmail('Ana@courses.pt')->first();
        $user->course_id = Course::whereName('French')->first()->id;
        $user->save();
        $user = User::whereEmail('Sofia@courses.pt')->first();
        $user->course_id = Course::whereName('German')->first()->id;
        $user->save();
        $user = User::whereEmail('Susana@courses.pt')->first();
        $user->course_id = Course::whereName('Chinese')->first()->id;
        $user->save();
        $user = User::whereEmail('Andreia@courses.pt')->first();
        $user->course_id = Course::whereName('Spanish')->first()->id;
        $user->save();
        $user = User::whereEmail('Andre@courses.pt')->first();
        $user->course_id = Course::whereName('C programming language')->first()->id;
        $user->save();
        $user = User::whereEmail('Carlos@courses.pt')->first();
        $user->course_id = Course::whereName('C++ programming language')->first()->id;
        $user->save();
        $user = User::whereEmail('Helder@courses.pt')->first();
        $user->course_id = Course::whereName('C# programming language')->first()->id;
        $user->save();
        $user = User::whereEmail('Micael@courses.pt')->first();
        $user->course_id = Course::whereName('PHP programming language')->first()->id;
        $user->save();
        $user = User::whereEmail('Antonio@courses.pt')->first();
        $user->course_id = Course::whereName('Visual Basic programming language')->first()->id;
        $user->save();
    }
}
