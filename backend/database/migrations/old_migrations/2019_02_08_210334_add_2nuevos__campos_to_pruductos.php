<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2nuevosCamposToPruductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_productos', function (Blueprint $table) {
            $table->text('WebLink_Subrubro1');
            $table->text('WebLink_Producto');
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
            $table->dropColumn('WebLink_Subrubro1');
            $table->dropColumn('WebLink_Producto');
        });
    }
}
