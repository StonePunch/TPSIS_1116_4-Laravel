<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('grades', function(Blueprint $table){
            $table->increments('id');
            $table->integer('grade');
            $table->timestamps();
        });

        schema::table('grades', function(Blueprint $table){
            $table->integer('course_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('grades');
    }
}
