<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            // fields for question
            $table->float('grade');
            $table->boolean('taken');
            $table->integer('quiz_id')->unsigned();
            $table->integer('user_id')->unsigned();

            // set foreign keys
            $table->foreign('quiz_id')->references('id')->on('quizzes');
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
        Schema::drop('grades');
    }
}
