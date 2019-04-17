<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosMayoristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_datos_mayoristas', function (Blueprint $table) {
            $table->increments('idDatosMayorista');
            $table->string('NOMBRE_LOCAL_MAYORISTA')->nullable();
            $table->string('DOMICILIO_LOCAL_MAYORISTA')->nullable();
            $table->string('TELEFONO_LOCAL_MAYORISTA')->nullable();
            $table->string('TELEFONO_USER')->nullable();
            $table->integer('fk_idUser')->unsigned();

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
        Schema::dropIfExists('tb_datos_mayoristas');
    }
}
