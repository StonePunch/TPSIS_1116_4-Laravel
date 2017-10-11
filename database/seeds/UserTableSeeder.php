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
                'picture' => 'admin@admin.pt_admin.jpg', 'user_type' => '3','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Maria', 'email' => 'Maria@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
            'picture' => 'maria@courses.pt_professora1.jpg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
            'course_id' => null
            ],
            ['name'=> 'Ana', 'email' => 'Ana@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1985-01-01',
                'picture' => 'ana@courses.pt_professora2.jpg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Joana', 'email' => 'Joana@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '2','sex' => 'Female', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Sofia', 'email' => 'Sofia@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1960-01-01',
                'picture' => 'sofia@courses.pt_professora3.jpg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Susana', 'email' => 'Susana@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1960-01-01',
                'picture' => 'susana@courses.pt_professora4.jpg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Andreia', 'email' => 'Andreia@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1960-01-01',
                'picture' => 'andreia@courses.pt_professora5.jpg', 'user_type' => '2','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Andre', 'email' => 'Andre@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1985-01-01',
                'picture' => 'andre@courses.pt_professor1.jpg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Carlos', 'email' => 'Carlos@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1983-08-01',
                'picture' => 'carlos@courses.pt_professor2.jpg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Helder', 'email' => 'Helder@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1990-01-01',
                'picture' => 'helder@courses.pt_professor3.jpg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Micael', 'email' => 'Micael@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1996-01-01',
                'picture' => 'micael@courses.pt_professor4.jpg', 'user_type' => '2','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Antonio', 'email' => 'Antonio@courses.pt', 'password' => bcrypt('1234567'), 'birth_date' => '1990-01-01',
                'picture' => 'antonio@courses.pt_professor5.jpg', 'user_type' => '2','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Ana', 'email' => 'Ana@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'ana@hotmail.com_aluna1.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Fabiana', 'email' => 'Fabiana@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'fabiana@hotmail.com_aluna2.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Rita', 'email' => 'Rita@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'rita@hotmail.com_aluna3.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Agostinha', 'email' => 'Agostinha@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Julieta', 'email' => 'Julieta@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'julieta@hotmail.com_aluna4.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Maria', 'email' => 'Maria@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'maria@hotmail.com_aluna5.png', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Sofia', 'email' => 'Sofia@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'sofia@hotmail.com_aluna6.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Ada', 'email' => 'Ada@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'ada@hotmail.com_aluna7.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Alexandra', 'email' => 'Alexandra@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Mariana', 'email' => 'Mariana@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'mariana@hotmail.com_aluna8.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Acacia', 'email' => 'Acacia@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'acacia@hotmail.com_aluna9.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Amanda', 'email' => 'Amanda@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'amanda@hotmail.com_aluna10.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Tatiana', 'email' => 'Tatiana@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Angelica', 'email' => 'Angelica@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'angelica@hotmail.com_aluna11.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Selena', 'email' => 'Selena@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'selena@hotmail.com_aluna12.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Anastacia', 'email' => 'Anastacia@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'anastacia@hotmail.com_aluna13.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Aurora', 'email' => 'Aurora@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'aurora@hotmail.com_aluna14.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Augusta', 'email' => 'Augusta@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'augusta@hotmail.com_aluna15.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Telma', 'email' => 'Telma@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Antonia', 'email' => 'Antonia@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'antonia@hotmail.com_aluna16.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Carla', 'email' => 'Carla@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'carla@hotmail.com_aluna17.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Carolina', 'email' => 'Carolina@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'carolina@hotmail.com_aluna18.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Madalena', 'email' => 'Madalena@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Catarina', 'email' => 'Catarina@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'catarina@hotmail.com_aluna19.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Cassandra', 'email' => 'Cassandra@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'cassandra@hotmail.com_aluna20.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Cristiana', 'email' => 'Cristiana@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'cristiana@hotmail.com_aluna21.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Judite', 'email' => 'Judite@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'judite@hotmail.com_aluna22.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '3',
                'course_id' => null
            ],
            ['name'=> 'Mafalda', 'email' => 'Mafalda@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_f.jpeg', 'user_type' => '1','sex' => 'Female', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Raquel', 'email' => 'Raquel@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'raquel@hotmail.com_aluna23.jpg', 'user_type' => '1','sex' => 'Female', 'schooling' => '4',
                'course_id' => null
            ],
            ['name'=> 'Diogo', 'email' => 'Diogo@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'diogo@hotmail.com_aluno1.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Paulo', 'email' => 'Paulo@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'paulo@hotmail.com_aluno2.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '8',
                'course_id' => null
            ],
            ['name'=> 'Daniel', 'email' => 'Daniel@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'daniel@hotmail.com_aluno3.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Gonçalo', 'email' => 'Gonçalo@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'gonçalo@hotmail.com_aluno4.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Joao', 'email' => 'Joao@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'joao@hotmail.com_aluno5.png', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Tiago', 'email' => 'Tiago@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'tiago@hotmail.com_aluno6.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Alberto', 'email' => 'Alberto@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Marco', 'email' => 'Marco@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'marco@hotmail.com_aluno7.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Antonio', 'email' => 'Antonio@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'antonio@hotmail.com_aluno8.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Micael', 'email' => 'Micael@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'micael@hotmail.com_aluno9.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Carlos', 'email' => 'Carlos@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'carlos@hotmail.com_aluno10.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Alexandre', 'email' => 'Alexandre@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Ronaldo', 'email' => 'Ronaldo@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'ronaldo@hotmail.com_aluno11.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Rui', 'email' => 'Rui@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'rui@hotmail.com_aluno12.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '7',
                'course_id' => null
            ],
            ['name'=> 'Claudio', 'email' => 'Claudio@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Raul', 'email' => 'Raul@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'raul@hotmail.com_aluno13.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Leandro', 'email' => 'Leandro@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'leandro@hotmail.com_aluno14.jpeg', 'user_type' => '1','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Lorenzo', 'email' => 'Lorenzo@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'lorenzo@hotmail.com_aluno15.jpeg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Aurelio', 'email' => 'Aurelio@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'aurelio@hotmail.com_aluno16.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Camilo', 'email' => 'Camilo@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'default_m.jpeg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ],
            ['name'=> 'Andre', 'email' => 'Andre@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'andre@hotmail.com_aluno17.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '6',
                'course_id' => null
            ],
            ['name'=> 'Ricardo', 'email' => 'Ricardo@hotmail.com', 'password' => bcrypt('1234567'), 'birth_date' => '1997-01-01',
                'picture' => 'ricardo@hotmail.com_aluno18.jpg', 'user_type' => '1','sex' => 'Male', 'schooling' => '5',
                'course_id' => null
            ]
        ]);
    }
}
