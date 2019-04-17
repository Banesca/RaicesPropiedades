<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesFootersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_imagenes_footers', function(Blueprint $table) {
            $table->increments('idImagenFooter');
            $table->string('imagen');
            $table->integer('orden')->nullable();
            $table->integer('fk_idConfigFooter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tb_imagenes_footers');
    }
}
