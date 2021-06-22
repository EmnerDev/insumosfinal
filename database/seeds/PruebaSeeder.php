<?php

use Illuminate\Database\Seeder;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'dni' => '12121212',
                'nombres' => 'admin',
                'apellidos' => 'rgrgr',
                'email' => 'unhevalasd@email.com',
                'password' => bcrypt('Unheval21')
            ],
            [
                'dni' => '14141414',
                'nombres' => 'Juana',
                'apellidos' => 'Condezo',
                'email' => 'unheval14@email.com',
                'password' => bcrypt('Juana21')
            ],
            [
                'dni' => '15151515',
                'nanombresme' => 'Celestina',
                'apellidos' => 'Garcia',
                'email' => 'unheval25@email.com',
                'password' => bcrypt('Celestina21')
            ]]
        );
        DB::table('presentacions')->insert([

                'nombre'=>'1 docena',

        ]);

        DB::table('productos')->insert([
              [
                'presentacion_id'=>1,
               'nombre' => "ALCOHOL",
               'descripcion' => "-",                
               'cantidad' => "100",
              ],
              [
                'presentacion_id'=>1,
                'nombre' => "JABON LIQUIDO",
                'descripcion' => "-",
                'cantidad' => "150",
             ],
             [
                'presentacion_id'=>1,
                'nombre' => "PAPEL HIGIENICO",
                'descripcion' => "-",                
                'cantidad' => "80",
              ],
           
        ]);
    }
}

