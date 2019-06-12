<?php

namespace App\Http\Controllers;

use App\Disposicion;
use App\EstadoPropiedad;
use App\EstadoPublicacion;
use App\Modulo;
use App\Moneda;
use App\Orientacion;
use App\StatusSistema;
use App\StatusUser;
use App\TipoAcceso;
use App\TipoAscensor;
use App\TipoBalcon;
use App\TipoBaño;
use App\TipoCalefaccion;
use App\TipoCampo;
use App\TipoCobertura;
use App\TipoCoche;
use App\TipoCochera;
use App\TipoCosta;
use App\TipoEdificio;
use App\TipoExpensas;
use App\TipoFondoComercio;
use App\TipoFrente;
use App\TipoHotel;
use App\TipoLocal;
use App\TipoMultimedia;
use App\TipoOperacion;
use App\TipoPendiente;
use App\TipoPiso;
use App\TipoPorton;
use App\TipoPropiedad;
use App\TipoTecho;
use App\TipoTechoIndustrial;
use App\TipoTerreno;
use App\TipoUnidadCasa;
use App\TipoUnidadDepartamento;
use App\TipoVista;
use App\User;
use Illuminate\Http\Request;

class ReturnSeedController extends Controller {
    public function get_StatusDelUserSeeder() {
        $StatusDelUser = StatusUser::get();

        return response()->json($StatusDelUser);

    }

    public function get_StatusSistemaSeeder() {
        $StatusSistema = StatusSistema::get();

        return response()->json($StatusSistema);

    }

    public function get_TipoTechoIndustrialseeder() {
        $TipoTechoIndustrial = TipoTechoIndustrial::get();

        return response()->json($TipoTechoIndustrial);

    }

    public function get_TipoMultimediaSeeder() {
        $TipoMultimedia = TipoMultimedia::get();

        return response()->json($TipoMultimedia);

    }

    public function get_TipoAscensorSeeder() {
        $TipoAscensor = TipoAscensor::get();

        return response()->json($TipoAscensor);

    }

    public function get_TipoCocheraSeeder() {
        $TipoCochera = TipoCochera::get();

        return response()->json($TipoCochera);

    }

    public function get_TipoHotelSeeder() {
        $TipoHotel = TipoHotel::get();

        return response()->json($TipoHotel);

    }

    public function get_OrientacionSeeder() {
        $Orientacion = Orientacion::get();

        return response()->json($Orientacion);

    }

    public function get_DisposicionSeeder() {
        $Disposicion = Disposicion::get();

        return response()->json($Disposicion);

    }

    public function get_TipoAccesoSeeder() {
        $TipoAcceso = TipoAcceso::get();

        return response()->json($TipoAcceso);

    }

    public function get_TipoCalefaccionSeeder() {
        $TipoCalefaccion = TipoCalefaccion::get();

        return response()->json($TipoCalefaccion);

    }

    public function get_TipoUnidadCasaSeeder() {
        $TipoUnidadCasa = TipoUnidadCasa::get();

        return response()->json($TipoUnidadCasa);

    }

    public function get_MonedasSeeder() {
        $Monedas = Moneda::get();

        return response()->json($Monedas);

    }

    public function get_TipoTechoSeeder() {
        $TipoTecho = TipoTecho::get();

        return response()->json($TipoTecho);

    }

    public function get_TipoPortonSeeder() {
        $TipoPorton = TipoPorton::get();

        return response()->json($TipoPorton);

    }

    public function get_ModulosDelSistemaSeeder() {
        $ModulosDelSistema = Modulo::get();

        return response()->json($ModulosDelSistema);

    }

    public function get_TipoPendienteSeeder() {
        $TipoPendiente = TipoPendiente::get();

        return response()->json($TipoPendiente);

    }

    public function get_EstadoPropiedadSeeder() {
        $EstadoPropiedad = EstadoPropiedad::get();

        return response()->json($EstadoPropiedad);

    }

    public function get_TipoBañoSeeder() {
        $TipoBaño = TipoBaño::get();

        return response()->json($TipoBaño);

    }

    public function get_TipoCoberturaSeeder() {
        $TipoCobertura = TipoCobertura::get();

        return response()->json($TipoCobertura);

    }

    public function get_TipoFondoComercioSeeder() {
        $TipoFondoComercio = TipoFondoComercio::get();

        return response()->json($TipoFondoComercio);

    }

    public function get_EstadoPublicacionSeeder() {
        $EstadoPublicacion = EstadoPublicacion::get();

        return response()->json($EstadoPublicacion);

    }

    public function get_TipoPropiedadSeeder() {
        $TipoPropiedad = TipoPropiedad::get();

        return response()->json($TipoPropiedad);

    }

    public function get_TipoCamppSeeder() {
        $TipoCampp = TipoCampo::get();

        return response()->json($TipoCampp);

    }

    public function get_TipoOperacionSeeder() {
        $TipoOperacion = TipoOperacion::get();

        return response()->json($TipoOperacion);

    }

    public function get_TipoFrenteSeeder() {
        $TipoFrente = TipoFrente::get();

        return response()->json($TipoFrente);

    }

    public function get_TipoCocheSeeder() {
        $TipoCoche = TipoCoche::get();

        return response()->json($TipoCoche);

    }

    public function get_TipoEdidificioSeeder() {
        $TipoEdidificio = TipoEdificio::get();

        return response()->json($TipoEdidificio);

    }

    public function get_UsersTableSeeder() {
        $UsersTable = User::get();

        return response()->json($UsersTable);

    }

    public function get_TipoUnidadDepartamentoSeeder() {
        $TipoUnidadDepartamento = TipoUnidadDepartamento::get();

        return response()->json($TipoUnidadDepartamento);

    }

    public function get_TipoCostaSeeder() {
        $TipoCosta = TipoCosta::get();

        return response()->json($TipoCosta);

    }

    public function get_TipoVistaSeeder() {
        $TipoVista = TipoVista::get();

        return response()->json($TipoVista);

    }

    public function get_TipoTerrenoSeeder() {
        $TipoTerreno = TipoTerreno::get();

        return response()->json($TipoTerreno);

    }

    public function get_TipoBalconSeeder() {
        $TipoBalcon = TipoBalcon::get();

        return response()->json($TipoBalcon);

    }

    public function get_TipoExpensasSeeder() {
        $TipoExpensas = TipoExpensas::get();

        return response()->json($TipoExpensas);

    }

    public function get_TipoPisoSeeder() {
        $TipoPiso = TipoPiso::get();

        return response()->json($TipoPiso);

    }

    public function get_TipoLocalSeeder() {
        $TipoLocal = TipoLocal::get();

        return response()->json($TipoLocal);

    }
}
