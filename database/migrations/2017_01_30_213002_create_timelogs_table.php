<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelogs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('data');
            $table->string('entrada');
            $table->string('sortida');
            $table->tinyInteger('festa');
            $table->tinyInteger('vacances');
            $table->tinyInteger('baixa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timelogs');
    }
}
