<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_suscripcions', function (Blueprint $table) {
            $table->increments('idSuscripcion');
            $table->string('email')->nullable();
            $table->string('motivoDeCancelacion')->nullable();
            $table->integer('fk_idStatusSistema')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_suscripcions');
    }
}
