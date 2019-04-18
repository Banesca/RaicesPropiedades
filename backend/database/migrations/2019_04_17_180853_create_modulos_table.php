<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_modulos', function (Blueprint $table) {
            $table->increments('idM');
            $table->string('modulo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('url')->nullable();
            $table->text('iconomodulo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_modulos');
    }
}
