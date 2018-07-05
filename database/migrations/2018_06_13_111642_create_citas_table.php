<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('cita_id');
            $table->integer('cliente_id');
            $table->datetime('fecha_hora');
            $table->string('tipo_tramite');
            $table->integer('ussuario_id');
            $table->integer('tipo_cita_id');
            $table->string('confirmacion_tramite');
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
        Schema::dropIfExists('citas');
    }
}
