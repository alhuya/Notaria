<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosAbogadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_abogado', function (Blueprint $table) {
            $table->increments('horario_abogado_id');
            $table->string('tipo_horario');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('usuario_id');
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
        Schema::dropIfExists('horarios_abogado');
    }
}
