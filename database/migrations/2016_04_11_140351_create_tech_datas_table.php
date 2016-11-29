<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpubli');
            $table->string('plantilla');
            $table->string('observacions');
            $table->integer('idfilmacio');
            $table->integer('identrada');
            $table->string('slug');
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
        Schema::drop('tech_datas');
    }
}
