<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=> 'admin', 'email' => 'admin@admin.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1990-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '3','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Maria', 'email' => 'Maria@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
            'picture' => 'default_f.jpeg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
            'course_id' => null
            ],
            ['name'=> 'Ana', 'email' => 'Ana@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1985-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Sofia', 'email' => 'Sofia@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1960-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Andre', 'email' => 'Andre@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1985-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Carlos', 'email' => 'Carlos@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1983-08-01',
                'picture' => 'default_m.jpeg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Helder', 'email' => 'Helder@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1990-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Micael', 'email' => 'Micael@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1996-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '2','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Antonio', 'email' => 'Antonio@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1990-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ]
        ]);

    }
}
