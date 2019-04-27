<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFondoDeComerciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_fondo_de_comercios', function (Blueprint $table) {
            $table->increments('idFondoComercio');
            $table->integer('Direccion_Pais_Id1')->nullable();
            $table->integer('Direccion_Provincia_Id1')->nullable();
            $table->integer('Direccion_Partido_Id1')->nullable();
            $table->integer('Direccion_Localidad_Id1')->nullable();
            $table->integer('Direccion_Ciudad_Id1')->nullable();
            $table->integer('Direccion_Barrio_Id1')->nullable();
            $table->integer('Direccion_Subbarrio_Id')->nullable();
            $table->integer('Direccion_Calle_Id1')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('SuperficieTerreno')->nullable();
            $table->text('SuperficiePlaya')->nullable();
            $table->text('SuperficieDeposito')->nullable();
            $table->text('SuperficieLocal')->nullable();
            $table->text('Antiguedad')->nullable();
            $table->text('fk_Estado')->nullable();
            $table->text('ReferenciaCercana')->nullable();
            $table->text('CantidadBanos')->nullable();
            $table->text('Vivienda')->nullable();
            $table->text('Expensas')->nullable();
            $table->text('CantidadCocheras')->nullable();
            $table->text('CantidadAmbientes')->nullable();
            $table->text('AntiguedadComercio')->nullable();
            $table->text('RecaudacionMensual')->nullable();
            $table->text('Local')->nullable();
            $table->text('VentaMercaderia')->nullable();
            $table->text('MetrosDeLaEsquina')->nullable();
            $table->text('fk_TipoFondoComercio')->nullable();
            $table->text('Ambientes_Cocina')->nullable();
            $table->text('Ambientes_Comedor')->nullable();
            $table->text('Ambientes_Deposito')->nullable();
            $table->text('Ambientes_Galpon')->nullable();
            $table->text('Ambientes_Garage')->nullable();
            $table->text('Ambientes_Oficina')->nullable();
            $table->text('Ambientes_Vestidor')->nullable();
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
        Schema::dropIfExists('tb_fondo_de_comercios');
    }
}