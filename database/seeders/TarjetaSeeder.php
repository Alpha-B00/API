<?php

namespace Database\Seeders;

use App\Models\Tarjeta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarjeta = new Tarjeta();
        $tarjeta -> num_tarjeta = '4596-4586-3654-6235';
        $tarjeta -> mes_caducidad = '02';
        $tarjeta -> anyo_caducidad = '26';
        $tarjeta -> cvv = '569';
        $tarjeta -> titular = 'Fernando Fernandez';
        $tarjeta -> id_cliente = '1';
        $tarjeta->save();

        $tarjeta2 = new Tarjeta();
        $tarjeta2 -> num_tarjeta = '3696-4896-4554-7895';
        $tarjeta2 -> mes_caducidad = '05';
        $tarjeta2 -> anyo_caducidad = '25';
        $tarjeta2 -> cvv = '458';
        $tarjeta2 -> titular = 'Antonio Mendoza';
        $tarjeta2 -> id_cliente = '2';
        $tarjeta2->save();
        
    }
}
