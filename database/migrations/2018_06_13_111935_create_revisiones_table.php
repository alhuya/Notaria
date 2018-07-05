<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisiones', function (Blueprint $table) {
            $table->increments('revision_id');
            $table->string('estatus1');
            $table->date('fecha');
            $table->integer('cliente_id');
            $table->string('estatus2');
            $table->integer('tipo_tramite_id');
            $table->integer('documentacion_id');
            $table->string('comentario');
            $table->string('tipo_revision');
            $table->integer('control_tramite_id');

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
        Schema::dropIfExists('revisiones');
    }
}
