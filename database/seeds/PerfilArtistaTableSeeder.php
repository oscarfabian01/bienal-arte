<?php

use Illuminate\Database\Seeder;
use App\PerfilArtista;

class PerfilArtistaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PerfilArtista::create(['perfil' => 'Novato']);
        PerfilArtista::create(['perfil' => 'Intermedio']);
        PerfilArtista::create(['perfil' => 'Avanzado']);
    }
}
