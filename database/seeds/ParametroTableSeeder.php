<?php

use Illuminate\Database\Seeder;
use App\Parametro;

class ParametroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parametro::create(['parametro' => 'emailAdmin', 'valor' => 'oscarfabian01@gmail.com']);
        Parametro::create(['parametro' => 'merchantId', 'valor' => '508029']);
        Parametro::create(['parametro' => 'accountId',  'valor' => '512321']);
        Parametro::create(['parametro' => 'apiKey',     'valor' => '4Vj8eK4rloUd272L48hsrarnUA']);
    }
}
