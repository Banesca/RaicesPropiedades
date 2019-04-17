<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_carrito_compras', function (Blueprint $table) {
            $table->increments('idCarrito');
            $table->string('descripcion')->nullable();
            $table->string('precio')->nullable();
            $table->float('cantidad')->nullable();
            $table->float('total')->nullable();

            $table->integer('fk_idUser')->nullable();
            $table->integer('fk_idProducto')->unsigned()->nullable();
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
        Schema::dropIfExists('tb_carrito_compras');
    }
}
