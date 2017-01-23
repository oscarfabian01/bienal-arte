<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando tabla tema_obra
        Schema::create('tema_obra', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->string('tema')->comment('Nombre del tema');
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
        //Eliminando tabla tema_obra
        Schema::drop('tema_obra');
    }
}
