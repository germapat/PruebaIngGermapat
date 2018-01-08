<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cliente',function($table){
            $table->increments('id');
            $table->string('documento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique();
            $table->string('referente_pago');
            $table->string('descripcion');
            $table->string('tipo_documento');
            $table->string('direccion');
            $table->string('telefono_movil');
            $table->string('valor_total');

        });

        Schema::create('cliente_transaccion', function ($table) {
            $table->increments('id');
            $table->string('ip')->ipAddress();
            $table->string('estado_pago')->default('1');
            $table->string('transactionID');
            $table->string('sessionID');
            $table->string('bank_code');
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();
            $table->foreign('cliente_id')
              ->references('id')
              ->on('cliente');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_transaccion');
        Schema::dropIfExists('cliente');
    }
}
