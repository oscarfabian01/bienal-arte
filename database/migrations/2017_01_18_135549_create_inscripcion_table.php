<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando tabla inscripción
        Schema::create('inscripcion', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->integer('artista_id')->unsigned()->comment('ID del artista ralacionado');
            $table->integer('obra_id')->unsigned()->comment('ID de la obra relacionada');
            $table->integer('estado')->nullable()->comment('Estado de la transacción: 4 Aprobada, 6 Declinada, 5 Expirada');
            $table->integer('aceptado')->default(0)->comment('Artista aceptado: 1 Aceptado, 0 rechazado');
            $table->timestamps();  

            //Llaves foraneas
            $table->foreign('artista_id')->references('id')->on('artista');
            $table->foreign('obra_id')->references('id')->on('obra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Eliminando tabla inscripción
        Schema::drop('inscripcion');
    }
}
