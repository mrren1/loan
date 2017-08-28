<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlatformlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platformlog', function (Blueprint $table) {
            $table->increments('platformlog_id');
            $table->string('platformlog_desc',60)->nullable();
            $table->string('platformlog_num',45)->nullable();
            $table->bigInteger('platformlog_time')->nullable();
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
        Schema::drop('platformlog');
    }
}
