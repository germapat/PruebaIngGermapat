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
                'referente_pago' => 'adb-123456-AB',
                'descripcion' => 'Pago prueba German',
                'tipo_documento' => 'CC: Cédula de ciudadanía colombiana',
                'direccion' => 'Avenida siempre viva 123',
                'telefono_movil' => '3000000012',
                'valor_total' => '10000',

            ]
        ]);
        DB::table('cliente')->insert([
            [
                'nombres' => 'Ismael',
                'apellidos' =>'Patiño Isaza',
                'documento' => '654321',
                'correo' => 'gdpm1986@hotmail.com',
                'referente_pago' => '654GFO-L321',
                'descripcion' => 'Pago prueba Ismael',
                'tipo_documento' => 'CC: Cédula de ciudadanía colombiana',
                'direccion' => 'Calle 123',
                'telefono_movil' => '3000000012',
                'valor_total' => '100000',

            ]
        ]);
        DB::table('cliente')->insert([
            [
                'nombres' => 'Adriana Maria',
                'apellidos' =>'Isaza',
                'documento' => '123456789',
                'correo' => 'adrianaisaza2007@yahoo.es',
                'referente_pago' => '123OUTT9Jljy456789',
                'descripcion' => 'Pago prueba Adriana Maria',
                'tipo_documento' => 'CC: Cédula de ciudadanía colombiana',
                'direccion' => 'Calle falsa 123',
                'telefono_movil' => '3000000012',
                'valor_total' => '568000',

            ]
        ]);
    }
}
