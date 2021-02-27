<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoDePropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_contacto_de_propiedads', function (Blueprint $table) {
            $table->increments('idContactoPropiedad');
            $table->string('nombre')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->text('mensaje')->nullable();
            $table->integer('fk_idPropiedad');
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
        Schema::dropIfExists('tb_contacto_de_propiedads');
    }
}
