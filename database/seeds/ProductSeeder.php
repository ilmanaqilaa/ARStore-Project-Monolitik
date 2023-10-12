<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'nama' => 'Desain Gedung',
            'harga' => 125000,
            'liga_id' => 1,
            'jenis' => 'Desain gedung pencakar langit', 
            'gambar' => 'building.jpg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Desain Dragon Head',
            'harga' => 125000,
            'liga_id' => 1,
            'jenis' => 'Desain kepala naga yang menyeramkan', 
            'gambar' => 'dragon.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Desain RUmput',
            'harga' => 125000,
            'liga_id' => 1,
            'jenis' => 'Asset rumput', 
            'gambar' => 'grass.jpg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Desain Rumah',
            'harga' => 125000,
            'liga_id' => 1,
            'jenis' => 'Desain rumah kompleks', 
            'gambar' => 'house.jpg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Desain Kamar Isometric',
            'harga' => 125000,
            'liga_id' => 1,
            'jenis' => 'Desain ruang kamar berbentuk isometric', 
            'gambar' => 'isometric.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Desain Ruang Tamu Isometric',
            'harga' => 125000,
            'liga_id' => 1,
            'jenis' => 'Desain ruang tamu berbentuk isometric', 
            'gambar' => 'tamu.png'
        ]);

    }
}
