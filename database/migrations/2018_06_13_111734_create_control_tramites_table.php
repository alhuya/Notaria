<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_tramites', function (Blueprint $table) {
            $table->increments('nuevo_tramite_id');
            $table->integer('carpeta_id');
            $table->date('fecha');
            $table->string('volumen');
            $table->string('folio');
            $table->string('otorgantes');
            $table->string('contrato');
            $table->integer('puesto_id');
            $table->integer('dependencia_id');
            $table->integer('tramite_dependencia_id');
            $table->string('revicion');
            $table->integer('kinegrama_id');
            $table->string('terminado');
            $table->date('fecha_entrega');
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
        Schema::dropIfExists('control_tramites');
    }
}
