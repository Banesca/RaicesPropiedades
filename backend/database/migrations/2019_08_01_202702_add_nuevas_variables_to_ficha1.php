<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevasVariablesToFicha1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            $table->text('descipcion')->nullable();
            $table->integer('fk_tipoPropiedad')->unsigned()->nullable();
            $table->integer('esUnaPropiedad')->nullable();
            $table->integer('esUnaNovedad')->nullable();
            $table->integer('apareceEnGaleriaInicia')->nullable();
            $table->integer('fk_estado_publicacion')->unsigned()->nullable();
            $table->integer('esUnaOportunidad')->nullable();
            $table->integer('fk_idTipoOperaion')->unsigned()->nullable();
            $table->double('precio');
            $table->integer('fk_idMonedas')->unsigned()->nullable();
            $table->string('comision')->nullable();
            $table->string('titulo')->nullable();
            $table->string('tipo_publicacion')->nullable();
            $table->boolean('aparece_en_galeria')->nullable();
            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();
            $table->string('imagen3')->nullable();
            $table->string('imagen4')->nullable();
            $table->string('imagen5')->nullable();
            $table->string('imagen6')->nullable();
            $table->string('imagen7')->nullable();
            $table->string('imagen_para_galeria')->nullable();
            $table->boolean('a_estrenar')->nullable();
            $table->boolean('no_publicar_precio_inter')->nullable();
            $table->string('informacion_adicional')->nullable();


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
