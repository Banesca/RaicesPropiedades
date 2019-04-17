<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgComoComprarToConfigFooter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_config_footers', function (Blueprint $table) {
            $table->string('img_como_comprar')->nullable();
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
            $table->dropColumn('img_como_comprar');
        });
    }
}
