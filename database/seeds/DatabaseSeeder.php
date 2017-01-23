<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //$this->call(UserTableSeeder::class);
        $this->call(TemaObraTableSeeder::class);
        $this->call(TecnicaObraTableSeeder::class);
        $this->call(PaisTableSeeder::class);
        $this->call(PerfilArtistaTableSeeder::class);
        
    }
}
