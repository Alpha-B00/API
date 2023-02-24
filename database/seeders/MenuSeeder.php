<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        $menu = new Menu();
        $menu -> nombre = 'Coliseo Romano';
        $menu -> precio = '265';
        $menu->save();
        
        $menu1 = new Menu();
        $menu1 -> nombre = 'Fontana di trevi';
        $menu1 -> precio = '280';
        $menu1->save();

        $menu2 = new Menu();
        $menu2 -> nombre = 'Pantheon';
        $menu2 -> precio = '315';
        $menu2 ->save();
    }
}
