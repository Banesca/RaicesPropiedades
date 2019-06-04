<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscripcionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_suscripcions', function(Blueprint $table) {
            $table->increments('idSuscripcion');
            $table->string('email')->nullable();
            $table->text('motivoDeCancelacion')->nullable();
            $table->integer('fk_idStatusSistema')->unsigned()->nullable();
            $table->text('tocken')->nullable();
            $table->text('sugerencia')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tb_suscripcions');
    }
}
