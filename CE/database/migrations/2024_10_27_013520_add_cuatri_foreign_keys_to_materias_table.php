<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCuatriForeignKeysToMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materias', function (Blueprint $table) {
            if (!Schema::hasColumn('materias', 'cuatri_in_id')) {
                $table->foreignId('cuatri_in_id')->nullable()->constrained('cuatri_in')->onDelete('cascade');
            }
            if (!Schema::hasColumn('materias', 'cuatri_con_id')) {
                $table->foreignId('cuatri_con_id')->nullable()->constrained('cuatri_con')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materias', function (Blueprint $table) {
            if (Schema::hasColumn('materias', 'cuatri_in_id')) {
                $table->dropForeign(['cuatri_in_id']);
                $table->dropColumn('cuatri_in_id');
            }
            if (Schema::hasColumn('materias', 'cuatri_con_id')) {
                $table->dropForeign(['cuatri_con_id']);
                $table->dropColumn('cuatri_con_id');
            }
        });
    }
}
