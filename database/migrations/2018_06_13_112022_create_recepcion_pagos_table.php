<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecepcionPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion_pagos', function (Blueprint $table) {
            $table->increments('recepcion_pago_id');
            $table->integer('cliente_id');
            $table->integer('presupuesto_id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('deposito_cuenta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepcion_pagos');
    }
}
