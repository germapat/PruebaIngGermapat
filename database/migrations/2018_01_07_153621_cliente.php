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
            $table->string('correo');
            $table->string('referente_pago');

        });

        Schema::create('cliente_transaccion', function ($table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
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
