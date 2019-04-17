<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagenesToConfigFooter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_config_footers', function (Blueprint $table) {
            $table->string('img_HOME')->nullable();
            $table->string('img_OFERTA')->nullable();
            $table->string('img_BLOG')->nullable();
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
            $table->dropColumn('img_HOME');
            $table->dropColumn('img_OFERTA');
            $table->dropColumn('img_BLOG');
        });
    }
}
