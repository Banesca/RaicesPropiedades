<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderToTbGaleriaHomeProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_galeria_home_productos', function (Blueprint $table) {
            $table->string('orden')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_galeria_home_productos', function (Blueprint $table) {
            $table->dropColumn('orden');
        });
    }
}
