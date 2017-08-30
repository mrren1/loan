<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('put', function (Blueprint $table) {
            $table->increments('put_id');
            $table->string('put_name',30)->nullable();
            $table->char('put_num',19)->nullable();
            $table->string('card_name',30)->nullable();
            $table->bigInteger('put_status')->dafault(0);
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
        Schema::drop('put');
    }
}
