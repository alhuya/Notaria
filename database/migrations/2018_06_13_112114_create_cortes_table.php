<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCortesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cortes', function (Blueprint $table) {
            $table->increments('corte_id');
            $table->integer('cliente_id');
            $table->integer('presupuesto_id');
            $table->date('fecha');
            $table->string('tipo_pago');
            $table->string('ingreso_trasferencia');
            $table->string('total');
            $table->string('vale');
            $table->string('comentarios');
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
        Schema::dropIfExists('cortes');
    }
}
