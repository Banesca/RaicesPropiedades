<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtrasImagenesToConfigFooter extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tb_config_footers', function(Blueprint $table) {
            $table->string('img_logo')->nullable();
            $table->string('img_seccionDelivery')->nullable();
            $table->string('img_novedades')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tb_config_footers', function(Blueprint $table) {
            $table->dropColumn('img_logo');
            $table->dropColumn('img_seccionDelivery');
            $table->dropColumn('img_novedades');
        });
    }
}
