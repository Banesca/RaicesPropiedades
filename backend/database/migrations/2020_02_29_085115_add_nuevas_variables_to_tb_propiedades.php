<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevasVariablesToTbPropiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            $table->double('cantidad_Toilette')->nullable();
            $table->text('informacion_adicional')->nullable();
            $table->string('calefaccion_Tipo_Balanceado')->nullable();
            $table->string('piso_Radiante_Individual')->nullable();
            $table->string('piso_Radiante_Central')->nullable();
            $table->string('hidromasaje')->nullable();
            $table->string('radiadores')->nullable();
            $table->string('calefon')->nullable();
            $table->string('cobertura_cochera')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            //
        });
    }
}
