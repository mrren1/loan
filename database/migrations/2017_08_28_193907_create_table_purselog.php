<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePurselog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purselog', function (Blueprint $table) {
            $table->increments('purselog_id');
            $table->string('purselog_num',45)->nullable();
            $table->string('purselog_desc',255)->nullable();
            $table->bigInteger('purselog_time')->nullable();
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
        Schema::drop('purselog');
    }
}
