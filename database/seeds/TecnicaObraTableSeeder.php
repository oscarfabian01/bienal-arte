<?php

use Illuminate\Database\Seeder;
use App\TecnicaObra;

class TecnicaObraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecnicaObra::create(['tecnica' => 'Oleo']);
        TecnicaObra::create(['tecnica' => 'Acrilico']);
        TecnicaObra::create(['tecnica' => 'Técnicas Mixtas']);
        TecnicaObra::create(['tecnica' => 'Escultura']);
        TecnicaObra::create(['tecnica' => '  Metal']);
        TecnicaObra::create(['tecnica' => '  Piedra']);
        TecnicaObra::create(['tecnica' => '  Madera']);
        TecnicaObra::create(['tecnica' => '  Técnicas Mixtas']);
    }
}
