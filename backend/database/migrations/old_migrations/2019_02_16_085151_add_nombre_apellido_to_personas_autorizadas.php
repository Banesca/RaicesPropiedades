<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNombreApellidoToPersonasAutorizadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_personas_autorizadas', function (Blueprint $table) {
            $table->string('nombre_apellido')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_personas_autorizadas', function (Blueprint $table) {
            $table->dropColumn('nombre_apellido');
        });
    }
}
