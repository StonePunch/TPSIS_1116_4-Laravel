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
        schema::create('user', function(Blueprint $table){
            $table->increments('userID');
            $table->string('name');
            $table->foreign('userType')->references('id')->on('typeID');
            $table->date('birthDate');
            $table->string('email');
            $table->string('password');
            $table->foreign('schooling')->references('id')->on('schoolingID');
            $table->string('picture');
            $table->foreign('course')->references('id')->on('courseID');
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
        schema::dropIfExists('user');
    }
}
