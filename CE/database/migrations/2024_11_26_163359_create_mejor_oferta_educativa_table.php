<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMejorOfertaEducativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mejor_oferta_educativa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oferta_educativa_id'); // ID de la oferta educativa seleccionada
            $table->string('etapa_inicial');
            $table->string('etapa_continuidad');
            $table->timestamps();

            // Clave foránea para asegurar integridad referencial
            $table->foreign('oferta_educativa_id')->references('id')->on('ofertas_educativas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mejor_oferta_educativa');
    }
}
