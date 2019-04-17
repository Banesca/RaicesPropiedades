<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevosCamposToPerfilClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_perfil_clientes', function (Blueprint $table) {
            $table->string('celular_codigo')->nullable();
            $table->string('celular_area')->nullable();
            $table->string('telefono_codigo')->nullable();
            $table->string('telefono_area')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_perfil_clientes', function (Blueprint $table) {
            $table->dropColumn('celular_codigo');
            $table->dropColumn('celular_area');
            $table->dropColumn('telefono_codigo');
            $table->dropColumn('telefono_area');
        });
    }
}
