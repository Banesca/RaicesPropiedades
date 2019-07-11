<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevosCamposTbTransacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_transacciones', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('imagen_1')->nullable();
            $table->string('imagen_2')->nullable();
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
        Schema::table('tb_transacciones', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('imagen_1');
            $table->dropColumn('imagen_2');
        });
    }
}
