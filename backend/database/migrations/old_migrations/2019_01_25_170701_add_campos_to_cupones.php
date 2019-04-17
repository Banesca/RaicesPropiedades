<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposToCupones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_coupons', function (Blueprint $table) {
            $table->string('base_cond')->nullable();
            $table->string('activar_uso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_coupons', function (Blueprint $table) {
            $table->dropColumn('base_cond');
            $table->dropColumn('activar_uso');
        });
    }
}
