<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDestacadoToProductos extends Migration
{
    public function up()
    {
        Schema::table('tb_productos', function (Blueprint $table) {
            $table->boolean('destacado')->nullable()->after('fk_idSatate');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_productos', function (Blueprint $table) {
            $table->dropColumn('destacado');
        });
    }
}
