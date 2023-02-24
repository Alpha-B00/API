<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horario = new Horario();
        $horario -> fecha = '2023-01-24';
        $horario -> hora = '14:00';
        $horario -> estado= 'disponible';
        $horario->save();

        $horario1 = new Horario();
        $horario1 -> fecha = '2023-01-24';
        $horario1 -> hora = '14:15';
        $horario1 -> estado= 'disponible';
        $horario1->save();
        
        $horario2 = new Horario();
        $horario2 -> fecha = '2023-01-24';
        $horario2 -> hora = '14:30';
        $horario2 -> estado= 'disponible';
        $horario2->save();

        $horario3 = new Horario();
        $horario3 -> fecha = '2023-01-25';
        $horario3 -> hora = '14:00';
        $horario3 -> estado= 'disponible';
        $horario3->save();

        $horario4 = new Horario();
        $horario4 -> fecha = '2023-01-25';
        $horario4 -> hora = '14:15';
        $horario4 -> estado= 'disponible';
        $horario4->save();
        
        $horario5 = new Horario();
        $horario5 -> fecha = '2023-01-25';
        $horario5 -> hora = '14:30';
        $horario5 -> estado= 'disponible';
        $horario5->save();

        $horario6 = new Horario();
        $horario6 -> fecha = '2023-01-26';
        $horario6 -> hora = '22:00';
        $horario6 -> estado= 'disponible';
        $horario6->save();

        $horario7 = new Horario();
        $horario7 -> fecha = '2023-01-26';
        $horario7 -> hora = '19:15';
        $horario7 -> estado= 'disponible';
        $horario7->save();
        
    }
}
