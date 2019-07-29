<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoOperacionToFicha1 extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tb_ficha1', function(Blueprint $table) {
            $table->integer('fk_idTipoOperaion')->unsigned()->nullable();
            $table->double('precio');
            $table->integer('fk_idMonedas')->unsigned()->nullable();
            $table->string('comision')->nullable();
            $table->string('titulo')->nullable();
            $table->string('tipo_publicacion')->nullable();
            $table->boolean('aparece_en_galeria')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tb_ficha1', function(Blueprint $table) {
            $table->dropColumn('fk_idTipoOperaion');
            $table->dropColumn('precio');
            $table->dropColumn('fk_idMonedas');
            $table->dropColumn('comision');
            $table->dropColumn('titulo');
            $table->dropColumn('tipo_publicacion');
            $table->dropColumn('aparece_en_galeria');
        });
    }
}
