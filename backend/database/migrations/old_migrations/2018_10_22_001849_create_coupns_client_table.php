<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoupnsClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_coupons_client', function (Blueprint $table) {
            $table->increments('idCuponsClient');
            $table->integer('fk_idUser')->unsigned();
            $table->integer('fk_idcoupons')->unsigned();
            $table->integer('fk_idSatate')->unsigned();
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
        Schema::dropIfExists('tb_coupons_client');
    }
}
