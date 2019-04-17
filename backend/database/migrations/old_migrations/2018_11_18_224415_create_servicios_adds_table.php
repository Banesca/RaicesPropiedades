<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosAddsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_servicios_add', function(Blueprint $table) {
            $table->increments('idServiciosAdd');
            $table->integer('fk_idClasificado')->unsigned()->nullable();
            $table->integer('fk_idLocal')->unsigned()->nullable();
            $table->dateTime('fechaHora')->nullable();
            $table->string('status')->nullable();
            $table->integer('fk_idUser')->unsigned()->nullable();
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
        Schema::dropIfExists('tb_servicios_add');
    }
}
