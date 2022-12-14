<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMasImagenesToTbPropiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            $table->string('imagen16')->nullable();
            $table->string('imagen17')->nullable();
            $table->string('imagen18')->nullable();
            $table->string('imagen19')->nullable();
            $table->string('imagen20')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            $table->dropColumn('imagen16');
            $table->dropColumn('imagen17');
            $table->dropColumn('imagen18');
            $table->dropColumn('imagen19');
            $table->dropColumn('imagen20');
        });
    }
}
