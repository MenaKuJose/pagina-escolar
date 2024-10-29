<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasEducativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas_educativas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('etapa_inicial');
            $table->integer('duracion_cuatri_in')->default(6); // 6 cuatrimestres por defecto para etapa inicial
            $table->string('etapa_continuidad');
            $table->integer('duracion_cuatri_con')->default(4); // 4 cuatrimestres por defecto para etapa continuidad
            $table->integer('horas_totales');
            $table->integer('creditos_totales');
            $table->integer('duracion_total_programa'); // Suma de duracion_cuatri_in y duracion_cuatri_con
            $table->string('mapa_curricular')->nullable(); // Guardar el PDF
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
        Schema::dropIfExists('ofertas_educativas');
    }
}
