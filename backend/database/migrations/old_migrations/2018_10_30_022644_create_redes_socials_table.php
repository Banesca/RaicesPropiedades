<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedesSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_redes_socials', function (Blueprint $table) {
            $table->increments('id_redSocial');
            $table->string('url_face',150);
            $table->string('url_twit',150);
            $table->string('url_inst',150);
            $table->string('url_what',150);

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
        Schema::dropIfExists('tb_redes_socials');
    }
}
