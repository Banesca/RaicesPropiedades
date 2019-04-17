<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckboxConfigGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_config_footers', function (Blueprint $table) {
            $table->boolean('uso_cupon_web')->default(true)->nullable();
            $table->boolean('uso_cupon_app')->default(true)->nullable();
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
            //
        });
    }
}
