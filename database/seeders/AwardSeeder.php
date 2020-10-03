<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('awards')->insert([
            'name' => 'Renault Kwid',
            'image_path' => 'awards/renault-bienvenida.jpg',
            'stock' => 2,
            'available_date_start' => '2020-12-01',
            'available_date_end' => '2020-12-31'
        ]);

        DB::table('awards')->insert([
            'name' => 'Bóxer Cargo',
            'image_path' => 'awards/boxer-cargo.jpg',
            'stock' => 5,
            'available_date_start' => '2020-10-01',
            'available_date_end' => '2020-12-31'
        ]);

        DB::table('awards')->insert([
            'name' => 'Cuartos fríos',
            'image_path' => 'awards/cuarto-frio.jpg',
            'stock' => 3,
            'available_date_start' => '2020-10-01',
            'available_date_end' => '2020-12-31'
        ]);

        DB::table('awards')->insert([
            'name' => 'Kit de eventos',
            'image_path' => 'awards/kit-eventos.jpg',
            'stock' => 4,
            'available_date_start' => '2020-10-01',
            'available_date_end' => '2020-12-31'
        ]);

        DB::table('awards')->insert([
            'name' => 'TV LG 50"',
            'image_path' => 'awards/tv-lg-50.jpg',
            'stock' => 9,
            'available_date_start' => '2020-10-01',
            'available_date_end' => '2020-12-31'
        ]);

        DB::table('awards')->insert([
            'name' => 'Bicicletas de domicilio',
            'image_path' => 'awards/bici-domicilio.jpg',
            'stock' => 15,
            'available_date_start' => '2020-10-01',
            'available_date_end' => '2020-12-31'
        ]);
    }
}
