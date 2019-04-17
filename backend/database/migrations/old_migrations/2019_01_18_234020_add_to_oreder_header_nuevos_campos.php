<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToOrederHeaderNuevosCampos extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tb_order_header', function(Blueprint $table) {
            $table->string('tipoIdentidad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('telefonoAutorizado')->nullable();
            $table->string('celularAutorizado')->nullable();
            $table->string('pasarpoteAutorizado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tb_order_header', function(Blueprint $table) {
            $table->dropColumn('tipoIdentidad');
            $table->dropColumn('provincia');
            $table->dropColumn('telefonoAutorizado');
            $table->dropColumn('celularAutorizado');
            $table->dropColumn('pasarpoteAutorizado');
        });
    }
}
