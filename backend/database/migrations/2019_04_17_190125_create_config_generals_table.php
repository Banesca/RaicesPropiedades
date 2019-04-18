<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigGeneralsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_config_general', function(Blueprint $table) {
            $table->increments('idCG');
            $table->string('quienesSomos')->nullable();
            $table->mediumText('direccion')->nullable();
            $table->string('celular1')->nullable();
            $table->string('celular2')->nullable();
            $table->string('correo')->nullable();
            $table->string('url_face')->nullable();
            $table->string('url_intagram')->nullable();
            $table->string('url_twitter')->nullable();
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
        Schema::dropIfExists('tb_config_general');
    }
}
