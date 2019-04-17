<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevosCamposPerfilCliente extends Migration
{
    public function up() {
        Schema::table('tb_perfil_clientes', function(Blueprint $table) {
            $table->string('domicilio_entrega')->nullable();
            $table->integer('fk_idTipoFactura')->unsigned()->nullable();
            $table->string('CUIT')->nullable();
            $table->string('CUITrazonSocial')->nullable();
            $table->string('CUITDomicilioFidcal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tb_perfil_clientes', function(Blueprint $table) {
            $table->dropColumn('domicilio_entrega');
            $table->dropColumn('fk_idTipoFactura');
            $table->dropColumn('CUIT');
            $table->dropColumn('CUITrazonSocial');
            $table->dropColumn('CUITDomicilioFidcal');

        });
    }
}
