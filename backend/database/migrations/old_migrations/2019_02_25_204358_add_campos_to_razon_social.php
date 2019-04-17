<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposToRazonSocial extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tb_razon_socials', function(Blueprint $table) {
            $table->string('sucursal')->nullable();
            $table->string('nombre_apellido')->nullable();
            $table->string('dni')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tb_razon_socials', function(Blueprint $table) {
            $table->dropColumn('sucursal');
            $table->dropColumn('nombre_apellido');
            $table->dropColumn('dni');
        });
    }
}
