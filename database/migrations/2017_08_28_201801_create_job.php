<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('job_id');
            $table->string('job_name',45)->nullable();
            $table->string('job_desc',45)->nullable();
            $table->bigInteger('job_status')->nullable();
            $table->bigInteger('parent_id')->nullable();
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
        Schema::drop('job');
    }
}
