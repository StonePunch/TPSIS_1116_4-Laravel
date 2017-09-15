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
        schema::create('course', function(Blueprint $table){
        $table->increments('CourseID');
        $table->string('name');
        $table->string('description');
        $table->string('duration');
        $table->date('startDate');
        $table->foreign('userID')->references('id')->on('teacher');
        $table->foreign('gradeID')->references('id')->on('grade');
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
        schema::dropIfExists('course');
    }
}
