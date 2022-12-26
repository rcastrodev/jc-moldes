<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'order'             => 'A1',
            'name'              => 'Pisos',
        ]);

        Category::create([
            'order'             => 'A2',
            'name'              => 'Revestimientos',
        ]);

        Category::create([
            'order'             => 'A3',
            'name'              => 'Placas Antihumedad',
        ]);

        Category::create([
            'order'             => 'A4',
            'name'              => 'Mesas Vibradoras',
        ]);

        Category::create([
            'order'             => 'A5',
            'name'              => 'Estanterías',
        ]);

        Category::create([
            'order'             => 'A6',
            'name'              => 'Insumos',
        ]);

    }
}
