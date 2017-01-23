<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando tabla perfil_artista
        Schema::create('perfil_artista', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->string('perfil')->comment('Nombre del perfil');
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
        //Eliminando tabla perfil_artista
        Schema::drop('perfil_artista');
    }
}
