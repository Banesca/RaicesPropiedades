<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBodyTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_order_body', function(Blueprint $table) {
            $table->increments('idOrderBody');
            $table->integer('fk_idOrderHeader');
            $table->string('codeProdSys')->nullable();
            $table->string('Cantidad_Producto')->nullable();
            $table->string('PrecioUnitario_Producto')->nullable();
            $table->string('PorcentajeDescuento_Producto')->nullable();
            $table->string('Devolucion_Producto')->nullable();
            $table->string('Numero_EncabezadoVenta')->nullable();
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
    public function down() {
        Schema::dropIfExists('order_body');
    }
}
