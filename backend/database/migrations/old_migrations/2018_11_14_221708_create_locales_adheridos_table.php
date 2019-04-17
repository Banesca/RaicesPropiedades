<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalesAdheridosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_locales_adheridos', function(Blueprint $table) {
            $table->increments('idLocalAdherido');
            $table->integer('fk_idClasificado');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('foto_1');
            $table->string('foto_2');
            $table->integer('fk_idUser');
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
        Schema::dropIfExists('tb_locales_adheridos');
    }
}
