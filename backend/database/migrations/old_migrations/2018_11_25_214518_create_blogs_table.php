<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_blogs', function(Blueprint $table) {
            $table->increments('idBlog');
            $table->integer('fk_idusuario')->unsigned()->nullable();
            $table->string('titulo')->nullable();
            $table->string('foto')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('fk_idCategoria')->unsigned()->nullable();
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
        Schema::dropIfExists('tb_blogs');
    }
}
