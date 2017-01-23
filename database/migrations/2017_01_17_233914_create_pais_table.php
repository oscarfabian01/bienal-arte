<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando tabla pais
        Schema::create('pais', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->string('codigo',5)->comment('Pais');
            $table->string('pais')->comment('Pais');
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
        //Eliminando tabla pais
        Schema::drop('pais');
    }
}
