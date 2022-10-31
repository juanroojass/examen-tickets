<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            // $table->id();
            $table->increments('id');
            $table->string('nombre_usuario_solicitud', 200)->nullable();
            $table->string('correo_solicitud', 200)->nullable();
            $table->string('descripcion_bug', 500)->nullable();
            $table->string('evidencia_solicitud', 100)->nullable();
            $table->dateTime('fecha_solicitud')->nullable();   
            $table->string('correo_registro', 200)->nullable();
            $table->integer('id_desarrollo');
            $table->integer('id_estatus');
            $table->string('comentario_seguimiento', 2000)->nullable();
            $table->dateTime('fecha_atencion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
        
    }
}
