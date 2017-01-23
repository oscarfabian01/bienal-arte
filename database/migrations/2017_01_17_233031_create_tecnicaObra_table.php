<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecnicaObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando tabla tecnica_obra
        Schema::create('tecnica_obra', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->string('tecnica')->comment('Nombre de la técnica');
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
        //Eliminando tabla tecnica_obra
        Schema::drop('tecnica_obra');
    }
}
