<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuatriConTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuatri_con', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oferta_educativa_id')->constrained('ofertas_educativas')->onDelete('cascade'); // Relación con la oferta educativa
            $table->string('nombre');
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
        Schema::dropIfExists('cuatri_con');
    }
}
