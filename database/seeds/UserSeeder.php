<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Muhammad Ilman Aqilaa',
        	'level' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' =>  bcrypt("admin123"),
        	'alamat' => 'Bandung',
        	'nohp' => '08814578645',
            // 'rememberToken' => Str::random(60),
            

        ]);
    }
}
