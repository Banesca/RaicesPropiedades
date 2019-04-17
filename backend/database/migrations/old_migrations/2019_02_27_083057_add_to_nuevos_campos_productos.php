<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToNuevosCamposProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_productos', function (Blueprint $table) {
            $table->string('arbol')->nullable();
            $table->string('rama')->nullable();
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
            $table->dropColumn('arbol');
            $table->dropColumn('rama');
        });
    }
}
