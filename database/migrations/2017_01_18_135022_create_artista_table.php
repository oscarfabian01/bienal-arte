<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando tabla artista
        Schema::create('artista', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->string('nombre')->comment('Nombres del artista');
            $table->string('apellido')->comment('Apellidos de artista');
            $table->integer('pais_id')->unsigned()->comment('Pais del artista');
            $table->string('lugar_nacimiento')->comment('Lugar nacimiento');
            $table->date('fecha_nacimiento')->comment('Fecha de nacimiento del artista');
            $table->string('direccion_postal')->nullable()->comment('Dirección postal del artista');
            $table->string('direccion_domicilio')->comment('Dirección domicilio del artista');
            $table->string('email')->comment('Dirección de correo electronico');
            $table->string('telefono_fijo')->nullable()->comment('Número del teléfono fijo');
            $table->string('telefono_movil')->comment('Número del teléfono movil');
            $table->integer('perfil_artista_id')->unsigned()->comment('Perfil del artista');
            $table->string('ruta_hoja_vida')->comment('Ubicación del archivo de hoja de vida');
            $table->timestamps();

            //Llaves foraneas
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('perfil_artista_id')->references('id')->on('perfil_artista');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Eliminando tabla artista
        Schema::drop('artista');
    }
}
