<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_user', function (Blueprint $table) {
            //to create new database table
           $table->integer('job_id')->unsigned()->index();
           $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

           $table->integer('user_id')->unsigned()->index();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

           $table->string('comment')->nullable();
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
        Schema::table('job_user', function (Blueprint $table) {
            //
            Schema::dropIfExists('job_user');
        });
    }
}
