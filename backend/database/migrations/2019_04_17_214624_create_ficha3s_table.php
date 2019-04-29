<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicha3sTable extends Migration {
    /**
     * Run the migrations_
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_ficha3s', function (Blueprint $table) {
            $table->increments('idFicha3');
            $table->integer('fk_tipoPropiedad')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations_
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tb_ficha3s');
    }
}






