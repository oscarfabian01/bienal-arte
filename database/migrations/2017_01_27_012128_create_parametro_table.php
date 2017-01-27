<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametro', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->string('parametro')->unique()->comment('Nombre del parametro');
            $table->string('valor')->comment('Valor del parametro');
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
        Schema::drop('parametro');
    }
}