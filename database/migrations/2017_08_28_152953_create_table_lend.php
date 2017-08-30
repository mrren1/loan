<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lend', function (Blueprint $table) {
            $table->increments('lend_id');
            $table->bigInteger('user_id');
            $table->bigInteger('lend_time')->nullable();
            $table->decimal('lend_money')->nullable();
            $table->string('lend_desc',100)->nullable();
            $table->bigInteger('lend_status')->default(0);
            $table->float('lend_interest')->default(0);
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
        Schema::drop('lend');
    }
}
