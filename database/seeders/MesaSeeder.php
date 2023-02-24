<?php

namespace Database\Seeders;

use App\Models\Mesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mesa = new Mesa();
        $mesa -> asientos = '1';
        $mesa->save();

        $mesa1 = new Mesa();
        $mesa1 -> asientos = '2';
        $mesa1->save();

        $mesa2 = new Mesa();
        $mesa2 -> asientos = '4';
        $mesa2->save();
        
        $mesa2 = new Mesa();
        $mesa2 -> asientos = '4';
        $mesa2->save();

        $mesa3 = new Mesa();
        $mesa3 -> asientos = '4';
        $mesa3->save();

        $mesa5 = new Mesa();
        $mesa5 -> asientos = '5';
        $mesa5->save();

        $mesa6 = new Mesa();
        $mesa6 -> asientos = '5';
        $mesa6->save();
    }
}
