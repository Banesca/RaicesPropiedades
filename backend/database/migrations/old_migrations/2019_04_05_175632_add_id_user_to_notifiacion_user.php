<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdUserToNotifiacionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_notificacion_por_users', function (Blueprint $table) {
            $table->integer('fk_idNotification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_notificacion_por_users', function (Blueprint $table) {
             $table->dropColumn('fk_idNotification');
        });
    }
}
