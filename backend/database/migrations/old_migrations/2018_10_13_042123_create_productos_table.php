<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_productos', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->string('nombre')->nullable();
            $table->string('titulo')->nullable();
            $table->string('urlImage')->nullable();
            $table->string('promocion')->nullable();
            $table->string('codeProdSys')->nullable();
            $table->string('kiloProdcuto')->nullable();
            $table->string('SubRubro1')->nullable();
            $table->string('SubRubro2')->nullable();
            $table->string('precioL1')->nullable();
            $table->string('precioL2')->nullable();
            $table->string('precioL3')->nullable();
            $table->string('precioL4')->nullable();
            $table->string('precioL5')->nullable();
            $table->string('precioL6')->nullable();
            $table->string('precioL7')->nullable();
            $table->string('precioL8')->nullable();
            $table->string('precioL9')->nullable();
            $table->string('rubro')->nullable();
            $table->string('marca')->nullable();
            $table->string('WebLink_Rubro')->nullable();
            $table->string('Weblink_fabricante')->nullable();
            $table->string('Agrupacion')->nullable();
            $table->integer('fk_idSatate')->unsigned();
            $table->string('stockActual')->nullable();
            $table->string('Valoracion_Fabricante')->nullable();
            $table->string('WebLink_mascota')->nullable();
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
        Schema::dropIfExists('tb_productos');
    }
}
