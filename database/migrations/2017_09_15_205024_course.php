<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Course extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('courses', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('duration');
            $table->date('start_date');
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->timestamps();
        });

        schema::table('courses', function(Blueprint $table){
            $table->foreign('teacher_id')->references('id')->on('users');
        });

        schema::table('users', function(Blueprint $table){
            $table->foreign('user_type')->references('id')->on('user_types');
            $table->foreign('schooling')->references('id')->on('schooling');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('courses');
    }
}
