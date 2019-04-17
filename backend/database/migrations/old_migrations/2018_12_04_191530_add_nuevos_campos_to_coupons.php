<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevosCamposToCoupons extends Migration {
    public function up() {
        Schema::table('tb_coupons', function(Blueprint $table) {
            $table->text('tipo_descuento')->nullable();
            $table->text('monto')->nullable();
            $table->text('promo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tb_coupons', function(Blueprint $table) {
            $table->dropColumn('tipo_descuento');
            $table->dropColumn('monto');
            $table->dropColumn('promo');
        });
    }
}
