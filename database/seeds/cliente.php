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
                'referente_pago' => '123456',
                'descripcion' => 'Pago prueba German',
                'tipo_documento' => 'CC: Cédula de ciudadanía colombiana',
                'direccion' => 'Avenidad siempre viva 123',
                'telefono_movil' => '3000000012',
                'valor_total' => '10000',

            ]
        ]);
    }
}
