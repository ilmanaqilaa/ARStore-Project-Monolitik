<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ligas')->insert([
        	'nama' => 'Asset 3 Dimensi',
        	'gambar' => '3dlogo.png',
        ]);

        DB::table('ligas')->insert([
        	'nama' => 'Kaos AR',
        	'gambar' => 'kaos.jpg',
        ]);

        DB::table('ligas')->insert([
        	'nama' => 'Catalog AR',
        	'gambar' => 'catalog.png',
        ]);

        DB::table('ligas')->insert([
        	'nama' => 'Card AR',
        	'gambar' => 'cardgames.png',
        ]);
    }
}
