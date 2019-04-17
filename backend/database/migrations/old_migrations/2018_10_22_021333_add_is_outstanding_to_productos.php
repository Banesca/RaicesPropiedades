<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsOutstandingToProductos extends Migration
{
    public function up()
    {
        Schema::table('tb_productos', function (Blueprint $table) {
            $table->integer('isOutstanding')->nullable()->after('fk_idSatate');
            $table->dateTime('fechaIsOutstanding')->nullable()->after('isOutstanding');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_productos', function (Blueprint $table) {
            $table->integer('isOutstanding');
            $table->dateTime('fechaIsOutstanding');
        });
    }
}
