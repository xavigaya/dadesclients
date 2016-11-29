<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idclient');
            $table->string('nom', 50);
            $table->string('format', 20);
            $table->string('mides', 15);
            $table->tinyInteger('forn')->default(0)->nullable;
            $table->string('observa', 200);
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('publications');
    }
}
