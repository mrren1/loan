<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLarge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('large', function (Blueprint $table) {
            $table->increments('large_id');
            $table->decimal('large_money')->default(0);
            $table->decimal('large_limit')->nullable();
            $table->bigInteger('begin_time')->nullable();
            $table->bigInteger('end_time')->nullable();
            $table->string('large_desc',255)->nullable();
            $table->string('pawn_goods',50)->nullable();
            $table->bigInteger('post_time')->nullable();
            $table->string('post_num',20)->nullable();
            $table->string('post_status',45)->default(0);
            $table->bigInteger('large_status')->default(0);
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
        Schema::drop('large');
    }
}
