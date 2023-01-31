<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id')->nullable();
            // $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('status');
            $table->float('progress');
            $table->string('steps');
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
        Schema::dropIfExists('course_user');
    }
}
