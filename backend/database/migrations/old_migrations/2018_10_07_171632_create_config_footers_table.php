<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigFootersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_config_footers', function(Blueprint $table) {
            $table->increments('idConfigFooter');
            $table->mediumText('direccion')->nullable();
            $table->string('nroContacto')->nullable();
            $table->string('mail1')->nullable();
            $table->string('mail2')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('whatsApp1')->nullable();
            $table->string('whatsApp2')->nullable();

            $table->string('horarios')->nullable();
            $table->string('subtes')->nullable();
            $table->string('colectivos')->nullable();
            $table->string('avenidas')->nullable();

            $table->string('desde')->nullable();
            $table->string('hasta')->nullable();
            $table->string('url_mercado_libre')->nullable();
            $table->string('imagen')->nullable();

            $table->string('url_app_store')->nullable();
            $table->string('url_google_play')->nullable();


            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tb_config_footers');
    }
}
