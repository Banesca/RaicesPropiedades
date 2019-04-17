<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuracionAlimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('tb_duracion_alimentos', function(Blueprint $table) {
            $table->increments('idDuracionAlimentos');
            $table->string('duracion')->nullable();
            $table->integer('fk_idUser')->nullable()->unsigned();
            $table->integer('fk_idProducto')->nullable()->unsigned();
            $table->date('fechaNotificacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists('tb_duracion_alimentos');
    }
}
