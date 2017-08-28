<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDebt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt', function (Blueprint $table) {
            $table->increments('debt_id');
            $table->bigInteger('user_id');           
            $table->decimal('debt_money')->nullable();
            $table->bigInteger('debt_btime')->nullable();
            $table->bigInteger('debt_stime')->nullable();
            $table->bigInteger('from_id')->nullable();
            $table->bigInteger('debt_status')->default(0);
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
        Schema::drop('debt');
    }
}
