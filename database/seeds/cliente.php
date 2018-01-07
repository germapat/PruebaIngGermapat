<?php

use Illuminate\Database\Seeder;

class cliente extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cliente')->insert([
            [
                'nombres' => 'German David',
                'apellidos' =>'Patiño Morales',
                'documento' => '123456',
                'correo' => 'gdpm1986@gmail.com',
                'referente_pago' => '123456'
            ]
        ]);
    }
}
