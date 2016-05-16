<?php

use Illuminate\Database\Seeder;
use App\Modelo;

class ModeloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modelo::create(['nombre' => 'RX1500']);
        Modelo::create(['nombre' => 'FX350']);
        Modelo::create(['nombre' => 'R9-500']);
    }
}
