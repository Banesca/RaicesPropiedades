<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_promociones', function(Blueprint $table) {
            $table->increments('idPromo');
            $table->integer('fk_idProducto');
            $table->string('urlImage');
            $table->string('titulo');
            $table->text('promocion');
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
        Schema::dropIfExists('tb_promociones');
    }
}
