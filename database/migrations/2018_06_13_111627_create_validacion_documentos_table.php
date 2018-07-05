<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidacionDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validacion_documentos', function (Blueprint $table) {
            $table->increments('valida_documento_id');
            $table->integer('cliente_id');
            $table->string('estatus');
            $table->integer('tipo_tramite_id');
            $table->integer('documentacion_id');
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
        Schema::dropIfExists('validacion_documentos');
    }
}
