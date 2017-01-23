<?php

use Illuminate\Database\Seeder;
use App\TemaObra;

class TemaObraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TemaObra::create(['tema' => 'Fenómenos desconocidos del planeta y fuera de este']);
     	TemaObra::create(['tema' => 'Fenómenos paranormales']);
     	TemaObra::create(['tema' => 'Mitos, ritos y leyendas' ]);
    }
}
