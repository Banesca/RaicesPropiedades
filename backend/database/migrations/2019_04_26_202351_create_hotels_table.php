<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hoteles', function (Blueprint $table) {
            $table->increments('idHotel');
            $table->integer('Direccion_Pais_Id1')->nullable();
            $table->integer('Direccion_Provincia_Id1')->nullable();
            $table->integer('Direccion_Partido_Id1')->nullable();
            $table->integer('Direccion_Localidad_Id1')->nullable();
            $table->integer('Direccion_Ciudad_Id1')->nullable();
            $table->integer('Direccion_Barrio_Id1')->nullable();
            $table->integer('Direccion_SubBarrio_Id1')->nullable();
            $table->integer('Direccion_Calle_Id1')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('SuperficieTerreno')->nullable();
            $table->text('SuperficieCubierta')->nullable();
            $table->text('SuperficieDescubierta')->nullable();
            $table->text('SuperficiePlaya')->nullable();
            $table->text('SuperficieDeposito')->nullable();
            $table->text('Antiguedad')->nullable();
            $table->text('CantidadPisos')->nullable();
            $table->text('HabitacionesPorPiso')->nullable();
            $table->integer('fk_Estado')->nullable();
            $table->text('CantidadPersonal')->nullable();
            $table->text('RentabilidadAnual')->nullable();
            $table->text('CantidadHabitaciones')->nullable();
            $table->text('CantidadEstrellas')->nullable();
            $table->text('cupada')->nullable();
            $table->text('CantidadPlazas')->nullable();
            $table->text('CantidadCubiertos')->nullable();
            $table->integer('fk_TipoHotel')->nullable();
            $table->integer('fk_TipoVista')->nullable();
            $table->integer('fk_TipoCosta')->nullable();
            $table->integer('fk_TipoPendiente')->nullable();
            $table->text('Ambientes_Balcon')->nullable();
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
        Schema::dropIfExists('tb_hoteles');
    }
}
