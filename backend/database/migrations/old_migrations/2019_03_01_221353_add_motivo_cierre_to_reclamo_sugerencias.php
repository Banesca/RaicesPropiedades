<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMotivoCierreToReclamoSugerencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_reclamos_y_sugerencias', function (Blueprint $table) {
            $table->text('motivo_cierre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_reclamos_y_sugerencias', function (Blueprint $table) {
            $table->dropColumn('motivo_cierre');
        });
    }
}
