<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasificadoReclamosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_clasificado_reclamos', function(Blueprint $table) {
            $table->increments('idClasificadoReclamo');
            $table->string('nombre')->nullable();
            $table->string('fk_idStatusReclamo')->nullable();
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
        Schema::dropIfExists('tb_clasificado_reclamos');
    }
}
