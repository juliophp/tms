<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobtitle');
            $table->string('jobdescription');
            $table->string('jobdeadline');
            $table->string('jobstatus');
            $table->string('jobowner');
            $table->tinyInteger('is_active')->default('1');
            $table->integer('viewcount')->default('0');
            $table->timestamps();
        });
        //start autoincrementing at 11111
        DB::update("ALTER TABLE jobs AUTO_INCREMENT = 11111");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
