<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusCuentaToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_users', function (Blueprint $table) {
            $table->string('statusUser')->nullable();
            $table->string('tockenActivarCuenta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_users', function (Blueprint $table) {
           $table->dropColumn('statusUser');
           $table->dropColumn('tockenActivarCuenta');
        });
    }
}
