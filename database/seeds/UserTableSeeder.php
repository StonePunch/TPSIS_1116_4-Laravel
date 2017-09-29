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
            ['name'=> 'admin', 'email' => 'admin@admin.pt', 'password' => '123', 'birth_date' => '1990-01-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_m.jpeg', 'user_type' => '3', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Maria', 'email' => 'Maria@courses.pt', 'password' => 'Maria', 'birth_date' => '1997-01-01',
            'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_f.jpeg', 'user_type' => '2', 'schooling' => '4',
            'course_id' => null
            ],
            ['name'=> 'Ana', 'email' => 'Ana@courses.pt', 'password' => 'Ana', 'birth_date' => '1985-01-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_f.jpeg', 'user_type' => '2', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Sofia', 'email' => 'Sofia@courses.pt', 'password' => 'Sofia', 'birth_date' => '1960-01-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_f.jpeg', 'user_type' => '2', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Andre', 'email' => 'Andre@courses.pt', 'password' => 'Andre', 'birth_date' => '1985-01-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_m.jpeg', 'user_type' => '2', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Carlos', 'email' => 'Carlos@courses.pt', 'password' => 'Carlos', 'birth_date' => '1983-08-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_m.jpeg', 'user_type' => '2', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Helder', 'email' => 'Helder@courses.pt', 'password' => 'Helder', 'birth_date' => '1990-01-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_m.jpeg', 'user_type' => '2', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Micael', 'email' => 'Micael@courses.pt', 'password' => 'Micael', 'birth_date' => '1996-01-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_m.jpeg', 'user_type' => '2', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Antonio', 'email' => 'Antonio@courses.pt', 'password' => 'Antonio', 'birth_date' => '1990-01-01',
                'picture' => '/mnt/C/Users/CarlosOliveira/tpsis_1116_4/public/uploads/default_m.jpeg', 'user_type' => '2', 'schooling' => '5',
                'course_id' => null
            ]
        ]);

    }
}
