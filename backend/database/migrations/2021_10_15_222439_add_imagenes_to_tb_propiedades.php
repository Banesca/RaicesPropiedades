<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagenesToTbPropiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            $table->text('imagen10')->nullable();
            $table->text('imagen11')->nullable();
            $table->text('imagen12')->nullable();
            $table->text('imagen13')->nullable();
            $table->text('imagen14')->nullable();
            $table->text('imagen15')->nullable();
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
            //
        });
    }
}
