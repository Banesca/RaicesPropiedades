<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_notification', function (Blueprint $table) {
            $table->increments('idNotification');
            $table->string('titleNotification');
            $table->string('descriptionNotification');
            $table->integer('fk_idSecctionApp');
            $table->integer('fk_idUser');
            $table->integer('isConfirm')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_notification');
    }
}
