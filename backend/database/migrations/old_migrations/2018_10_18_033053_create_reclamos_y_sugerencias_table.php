<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamosYSugerenciasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_reclamos_y_sugerencias', function(Blueprint $table) {
            $table->increments('idReclamosSugerencia');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('numero_ticket');
            $table->integer('fk_idUser')->unsigned();
            $table->integer('fk_idStatusReclamo')->unsigned();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('reclamos_y_sugerencias');
    }
}
