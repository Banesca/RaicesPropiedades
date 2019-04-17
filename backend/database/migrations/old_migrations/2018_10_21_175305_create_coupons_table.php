<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_coupons', function (Blueprint $table) {
            $table->increments('idCoupons');
            $table->integer('fk_idProducto')->unsigned();
            $table->string('codeCoupns');
            $table->string('title');
            $table->string('description');
            $table->string('imagen');
            $table->date('dateExpired');
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
        Schema::dropIfExists('tb_coupons');
    }
}
