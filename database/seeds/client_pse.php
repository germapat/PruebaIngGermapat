<?php

use Illuminate\Database\Seeder;

class client_pse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente_pse')->insert([
            [
                'nombres' => 'German David',
                'apellidos' =>'Patiño Morales',
                'documento' => '123456',
                'correo' => 'gdpm1986@gmail.com',
            ]
        ]);
    }
}
