<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->increments('message_id');
            $table->bigInteger('user_id');
            $table->string('message_name', 30);
            $table->bigInteger('message_sex')->nullable();
            $table->bigInteger('message_age')->nullable();
            $table->string('message_address', 60);
            $table->string('message_job', 30)->nullable();
            $table->string('message_revenue', 30)->nullable();
            $table->string('message_phone', 11)->nullable();
            $table->bigInteger('message_stars')->default(1);
            $table->string('message_idcard', 60)->nullable();
            $table->string('message_jiacard', 60)->nullable();
            $table->string('message_fangcard', 60)->nullable();
            $table->string('message_photo', 60)->nullable(); 
            $table->string('private_photo', 50)->nullable();
            $table->decimal('message_limit')->default(1000);
            $table->string('message_review', 90)->nullable();
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
        Schema::drop('message');
    }
}
