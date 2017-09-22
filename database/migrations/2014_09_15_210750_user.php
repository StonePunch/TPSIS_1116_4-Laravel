<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('email');
            $table->string('password');
            $table->string('picture');
            $table->integer('user_type')->unsigned();
            $table->integer('schooling')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('users');
    }
}
