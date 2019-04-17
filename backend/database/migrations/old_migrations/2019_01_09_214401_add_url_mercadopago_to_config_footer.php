<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlMercadopagoToConfigFooter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_config_footers', function (Blueprint $table) {
            $table->string('url_mercadopago')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_config_footers', function (Blueprint $table) {
            $table->dropColumn('url_mercadopago');
        });
    }
}
