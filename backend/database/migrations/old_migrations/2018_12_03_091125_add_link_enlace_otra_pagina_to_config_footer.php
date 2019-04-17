<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkEnlaceOtraPaginaToConfigFooter extends Migration
{
    public function up() {
        Schema::table('tb_config_footers', function(Blueprint $table) {
            $table->text('link_otra_pagina')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tb_config_footers', function(Blueprint $table) {
            $table->dropColumn('link_otra_pagina');
        });
    }
}
