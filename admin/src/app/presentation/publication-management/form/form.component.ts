import { Component, OnInit } from '@angular/core';
import { GestionPublicacionesService } from 'src/app/services/gestion-publicaciones/gestion-publicaciones.service';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertsService } from 'src/app/services/alerts.service';
import { PublicacionesService } from 'src/app/services/publicaciones/publicaciones.service';
import { IPublicacion, VistaPublicaciones } from 'src/app/services/publicaciones/publicaciones.interface';
import { DataByTipoPropiedad } from './datosPorTipoPropiedad';
import { element } from '@angular/core/src/render3';

@Component({
   selector: 'app-form',
   templateUrl: './form.component.html',
   styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {

   loading: boolean = false

   formOne: FormGroup;
   formTwo: FormGroup;
   formThree: FormGroup;

   id: string

   publication: any

   //Variables del 1er Step
   arrayEstadoPublicacion: any[] = [];
   arrayTipoDePropiedad: any[] = [];

   //Variables del 2do Step
   imageNotFound = 'assets/not-found-publicaciones.png';
   imageGalery: File;
   image1: File;
   image2: File;
   image3: File;
   image4: File;
   image5: File;
   image6: File;
   image7: File;

   //Variables del 3er Step
   arrayTipoDeUnidad: any[] = [];
   arrayTipoDeOperacion: any[] = [];
   arrayMonedas: any[] = [];
   arrayEstadoDePropiedad: any[] = [];
   arrayPais: any[] = [];
   arrayProvincia: any[] = [];
   arrayPartido: any[] = [];
   arrayLocalidad: any[] = [];
   arrayCiudad: any[] = [];
   arrayBarrio: any[] = [];
   arraySubBarrio: any[] = [];
   arrayCalle: any[] = [];
   arrayDisposicion: any[] = [];
   arrayOrientacion: any[] = [];
   arrayTipoBalcon: any[] = [];
   arrayTipoExpensas: any[] = [];
   arrayTipoVista: any[] = [];
   arrayTipoCosta: any[] = [];
   arrayTipoTecho: any[] = [];
   arrayTipoPiso: any[] = [];
   arrayTipoPendiente: any[] = [];
   arrayTipoCobertura: any[] = [];
   arrayTipoCoche: any[] = [];
   arrayTipoAcceso: any[] = [];
   arrayTipoBano: any[] = [];
   arrayTipoAscensor: any[] = [];
   arrayTipoTechoIndustrial: any[] = [];
   arrayTipoPorton: any[] = [];
   arrayTipoCalefaccion: any[] = [];

   arrayMedidasDeAmbientes: { label: string, selected: boolean, medidas: any }[] = [];
   arrayAmbientes: { label: string, variableName: string, isMedidas: boolean, medidas: string, selected: boolean }[] = [];

   //Inicializamos la vista en blanco
   vista: VistaPublicaciones = {
      caracteristicas: {},
      ambientes: [],
      instalaciones: [],
      servicios: [],
      edificio: {
         caracteristicas: [],
         instalaciones: [],
         servicios: []
      }
   }

   inPromise: boolean = false;

   constructor(
      private service: PublicacionesService,
      private activatedRoute: ActivatedRoute,
      private router: Router,
      private fb: FormBuilder,
      private alertService: AlertsService
   ) { }

   ngOnInit(): void {
      /**
       * Colocar toda la carga de select en esta parte
       */


      this.activatedRoute.params.subscribe(params => {
         this.id = params.id
         if (this.id) {
            // EN  CASO DE EDICION CARGA LOS DATOS DEL REGISTRO A EDITAR
            this.createForm(true);

         } else {
            this.createForm()
         }
      })

   }

   loadSelects() {

      this.service.getEstadoPublicacion().then((resp: any) => {
         this.arrayEstadoPublicacion = resp;
      });

      this.service.getTipoPropiedad().then((resp: any) => {
         this.arrayTipoDePropiedad = resp;
      });

      this.service.getTipoOperacion().then((resp: any) => {
         this.arrayTipoDeOperacion = resp;
      });

      this.service.getEstadoPropiedad().then((resp: any) => {
         this.arrayEstadoDePropiedad = resp;
      });

      this.service.getMonedas().then((resp: any) => {
         this.arrayMonedas = resp;
      });

      this.service.getPaises().then((resp: any) => {
         this.arrayPais = resp.Paises;
      });

      this.service.getProvincias().then((resp: any) => {
         this.arrayProvincia = resp.Provincias;
      });

      this.service.getDisposicion().then((resp: any) => {
         this.arrayDisposicion = resp;
      });

      this.service.getOrientacion().then((resp: any) => {
         this.arrayOrientacion = resp;
      });

      this.service.getTipoBalcon().then((resp: any) => {
         this.arrayTipoBalcon = resp;
      });

      this.service.getTipoExpensas().then((resp: any) => {
         this.arrayTipoExpensas = resp;
      });

      this.service.getTipoVista().then((resp: any) => {
         this.arrayTipoVista = resp;
      });

      this.service.getTipoCosta().then((resp: any) => {
         this.arrayTipoCosta = resp;
      });

      this.service.getTipoTecho().then((resp: any) => {
         this.arrayTipoTecho = resp;
      });

      this.service.getTipoPiso().then((resp: any) => {
         this.arrayTipoPiso = resp;
      });

      this.service.getTipoPendiente().then((resp: any) => {
         this.arrayTipoPendiente = resp;
      });

      this.service.getTipoCobertura().then((resp: any) => {
         this.arrayTipoCobertura = resp;
      });

      this.service.getTipoCoche().then((resp: any) => {
         this.arrayTipoCoche = resp;
      });

      this.service.getTipoAcceso().then((resp: any) => {
         this.arrayTipoAcceso = resp;
      });

      this.service.getTipoBano().then((resp: any) => {
         let arrAux = []
         for (let index = 0; index < resp.length; index++) {
            const element = resp[index];
            let o = {
               idTipoBano: element.idTipoBaño,
               descripcion: element.descripcion
            }
            arrAux.push(o);
         }
         this.arrayTipoBano = arrAux;
      });

      this.service.getTipoAscensor().then((resp: any) => {
         this.arrayTipoAscensor = resp;
      });

      this.service.getTipoTechoIndustrial().then((resp: any) => {
         this.arrayTipoTechoIndustrial = resp;
      });

      this.service.getTipoPorton().then((resp: any) => {
         this.arrayTipoPorton = resp;
      });

      this.service.getTipoCalefaccion().then((resp: any) => {
         this.arrayTipoCalefaccion = resp;
      });

   }

   createForm(isUpdate?: boolean) {
      this.loading = true;
      this.formOne = this.fb.group({
         titulo: ['', Validators.required],
         fk_estado_publicacion: [null, Validators.required],
         descipcion: ['', Validators.required], //Descripcion --> se coloca descipcion por motivo de concordar con el error de backend
         fk_idTipoPropiedad: [null, Validators.required],
         esUnaOportunidad: ["0", Validators.required],
         esUnaNovedad: ["0", Validators.required],
         aparece_en_galeria: ["1", Validators.required],
      })
      this.formTwo = this.fb.group({
         imageGalery: ['', Validators.required],
         image1: ['', Validators.required],
         image2: [''],
         image3: [''],
         image4: [''],
         image5: [''],
         image6: [''],
         image7: ['']
      })
      this.formThree = this.fb.group({
         //Datos Basicos
         tipoDeUnidad: ['', Validators.required],
         fk_idTipoOperaion: ['', Validators.required], // se coloca fk_idTipoOperaion para coincidir con el campo del backend
         precio: ['', Validators.required],
         fk_idMonedas: ['', Validators.required],
         no_publicar_precio_inter: [false],
         fk_Estado: ['', Validators.required],

         //Compartir comision
         comision: ["50", Validators.required],


         //Ubicación
         //fk_Direccion_Pais_Id: ['', Validators.required],
         fk_Direccion_Provincia_Id: ['', Validators.required],
         fk_Direccion_Partido_Id: ['', Validators.required],
         fk_Direccion_Localidad_Id: ['', Validators.required],
         fk_Direccion_Ciudad_Id: [''],
         fk_Direccion_Barrio_Id: [''],
         fk_Direccion_SubBarrio_Id: [''],
         Direccion_Nombrecalle: [''],
         Direccion_Numero: [''],
         Direccion_Piso: [''],
         Direccion_Departamento: [''],
         Direccion_Coordenadas_Latitud: [''],
         Direccion_Coordenadas_Longitud: [''],


         //Caracteristicas
         //Inputs
         LongitudFrente: [''],
         LongitudFondo: [''],
         Antiguedad: [''],
         SuperficieCubierta: [''],
         SuperficieDescubierta: [''],
         CantidadCocheras: [''],
         Expensas: [''],
         CantidadBanos: [''],
         CantidadAmbientes: [''],
         CantidadDormitorios: [''],
         CantidadPlantas: [''],
         SuperficieTerreno: [''],
         Largo: [''],
         Ancho: [''],
         Altura: [''],
         MontoExpensas: [''],
         MetrosDeLaEsquina: [''],
         UltimaActividad: [''],
         GaleriaShopping: [''],
         SuperficiePlaya: [''],
         SuperficieDeposito: [''],
         CantidadPisos: [''],
         HabitacionesPorPiso: [''],
         CantidadPersonal: [''],
         RentabilidadAnual: [''],
         CantidadHabitaciones: [''],
         CantidadEstrellas: [''],
         CantidadPlazas: [''],
         CantidadCubiertos: [''],
         SuperficieTotal: [''],
         SuperficieConstruible: [''],
         MedidaLinealDerecha: [''],
         MedidaLinealIzquierda: [''],
         FOT: [''],
         Zonificacion: [''],
         SuperficiePlanta: [''],
         DepartamentosPorPiso: [''],
         SuperficieOficina: [''],
         SuperficieCubiertaCasa: [''],
         CantidadHectareas: [''],
         DistanciaPavimento: [''],
         SuperficieLocal: [''],
         ReferenciaCercana: [''],
         AntiguedadComercio: [''],
         RecaudacionMensual: [''],
         CantidadOficinas: [''],
         AnchoEntrada: [''],
         AltoEntrada: [''],
         CantidadColumnas: [''],
         CantidadNaves: [''],
         AlturaTecho: [''],
         Detalle: [''],
         TipoBien: [''],


         //Checks
         AptoCredito: [false],
         AptoProfesional: [false],
         CocheraOptativa: [false],
         PropiedadOcupada: [false],
         Generales_PermiteMascotas: [false],
         Generales_SeguroCaucion: [false],
         Baulera: [false],
         Vivienda: [false],
         TerrenoPropio: [false],
         Vidriera: [false],
         EnEdificio: [false],
         Demolicion: [false],
         FondoIrregular: [false],
         FrenteIrregular: [false],
         LateralDerechoIrregular: [false],
         LateralIzquierdoIrregular: [false],
         Reciclado: [false],
         Ganaderia: [false],
         Agricultura: [false],
         CasaPrincipal: [false],
         CasaCaseros: [false],
         Local: [false],
         VentaMercaderia: [false],
         GeneradorPropio: [false],


         //Selects
         fk_Disposicion: [''],
         fk_Orientacion: [''],
         fk_TipoBalcon: [''],
         fk_TipoExpensas: [''],
         fk_TipoVista: [''],
         fk_TipoCosta: [''],
         fk_TipoTecho: [''],
         fk_TipoPiso: [''],
         fk_TipoPendiente: [''],
         fk_TipoCobertura: [''],
         fk_TipoCoche: [''],
         fk_TipoAcceso: [''],
         fk_TipoBano: [''],
         fk_TipoAscensor: [''],
         fk_TipoTechoIndustrial: [''],
         fk_TipoCalefaccion: [''],
         fk_TipoPorton: [''],

      })

      this.loadSelects();

      if (isUpdate) {

         this.service.getPropiedad(this.id).then((res: any) => {
            
            if (res.msj) {
            this.alertService.msg('ERR', 'Propiedad', res.msj);
               return;
            } 

            //Cargamos el 1er step
            this.formOne.setValue({
               titulo: res.titulo ? res.titulo : '',
               fk_estado_publicacion: res.fk_estado_publicacion,
               descipcion: res.descipcion, //Descripcion --> se coloca descipcion por motivo de concordar con el error de backend
               fk_idTipoPropiedad: res.fk_idTipoPropiedad,
               esUnaOportunidad: res.esUnaOportunidad == 1 ? "1" : "0",
               esUnaNovedad: res.esUnaNovedad == 1 ? "1" : "0",
               aparece_en_galeria: res.aparece_en_galeria == 1 ? "1" : "0",
            });

            //Ejecutamos la validacion si aparece en galería
            this.changeApareceEnGaleria();

            //Ejecutamos el select de tipo de propiedad
            this.changeTipoPropiedad({ value: res.fk_idTipoPropiedad });

            //Cargamos el 2do step
            this.formTwo.setValue({
               imageGalery: res.imagen_para_galeria ? res.imagenes.imagen_para_galeria : null,
               image1: res.imagen1 ? res.imagenes.imagen1 : null,
               image2: res.imagen2 ? res.imagenes.imagen2 : null,
               image3: res.imagen3 ? res.imagenes.imagen3 : null,
               image4: res.imagen4 ? res.imagenes.imagen4 : null,
               image5: res.imagen5 ? res.imagenes.imagen5 : null,
               image6: res.imagen6 ? res.imagenes.imagen6 : null,
               image7: res.imagen7 ? res.imagenes.imagen7 : null
            });

            //Cargamos el 3er step
            //Cargamos los dependientes de dirección segun los datos
            this.reloadPartidos({ value: res.fk_Direccion_Provincia_Id });
            this.reloadLocalidades({ value: res.fk_Direccion_Partido_Id });
            res.fk_Direccion_Localidad_Id ? this.reloadBarrios({ value: res.fk_Direccion_Localidad_Id }) : null;
            res.fk_Direccion_Barrio_Id ? this.reloadSubBarrios({ vakue: res.fk_Direccion_Barrio_Id }) : null;

            this.formThree.setValue({
               //Datos Basicos
               tipoDeUnidad: this.getTipoDeUnidad(res),
               fk_idTipoOperaion: res.fk_idTipoOperaion, // se coloca fk_idTipoOperaion para coincidir con el campo del backend
               precio: res.precio,
               fk_idMonedas: res.fk_idMonedas,
               no_publicar_precio_inter: res.no_publicar_precio_inter == 1 ? true : false,
               fk_Estado: res.fk_Estado,

               //Compartir comision
               comision: res.comision,


               //Ubicación
               //fk_Direccion_Pais_Id: ['', Validators.required],
               fk_Direccion_Provincia_Id: res.fk_Direccion_Provincia_Id,
               fk_Direccion_Partido_Id: res.fk_Direccion_Partido_Id,
               fk_Direccion_Localidad_Id: res.fk_Direccion_Localidad_Id,
               fk_Direccion_Ciudad_Id: res.fk_Direccion_Ciudad_Id,
               fk_Direccion_Barrio_Id: res.fk_Direccion_Barrio_Id,
               fk_Direccion_SubBarrio_Id: res.fk_Direccion_SubBarrio_Id,
               Direccion_Nombrecalle: res.Direccion_Nombrecalle,
               Direccion_Numero: res.Direccion_Numero,
               Direccion_Piso: res.Direccion_Piso,
               Direccion_Departamento: res.Direccion_Departamento,
               Direccion_Coordenadas_Latitud: res.Direccion_Coordenadas_Latitud,
               Direccion_Coordenadas_Longitud: res.Direccion_Coordenadas_Longitud,


               //Caracteristicas
               //Inputs
               LongitudFrente: res.LongitudFrente,
               LongitudFondo: res.LongitudFondo,
               Antiguedad: res.Antiguedad,
               SuperficieCubierta: res.SuperficieCubierta,
               SuperficieDescubierta: res.SuperficieDescubierta,
               CantidadCocheras: res.CantidadCocheras,
               Expensas: res.Expensas,
               CantidadBanos: res.CantidadBanos,
               CantidadAmbientes: res.CantidadAmbientes,
               CantidadDormitorios: res.CantidadDormitorios,
               CantidadPlantas: res.CantidadPlantas,
               SuperficieTerreno: res.SuperficieTerreno,
               Largo: res.Largo,
               Ancho: res.Ancho,
               Altura: res.Altura,
               MontoExpensas: res.MontoExpensas,
               MetrosDeLaEsquina: res.MetrosDeLaEsquina,
               UltimaActividad: res.UltimaActividad,
               GaleriaShopping: res.GaleriaShopping,
               SuperficiePlaya: res.SuperficiePlaya,
               SuperficieDeposito: res.SuperficieDeposito,
               CantidadPisos: res.CantidadPisos,
               HabitacionesPorPiso: res.HabitacionesPorPiso,
               CantidadPersonal: res.CantidadPersonal,
               RentabilidadAnual: res.RentabilidadAnual,
               CantidadHabitaciones: res.CantidadHabitaciones,
               CantidadEstrellas: res.CantidadEstrellas,
               CantidadPlazas: res.CantidadPlazas,
               CantidadCubiertos: res.CantidadCubiertos,
               SuperficieTotal: res.SuperficieTotal,
               SuperficieConstruible: res.SuperficieConstruible,
               MedidaLinealDerecha: res.MedidaLinealDerecha,
               MedidaLinealIzquierda: res.MedidaLinealIzquierda,
               FOT: res.FOT,
               Zonificacion: res.Zonificacion,
               SuperficiePlanta: res.SuperficiePlanta,
               DepartamentosPorPiso: res.DepartamentosPorPiso,
               SuperficieOficina: res.SuperficieOficina,
               SuperficieCubiertaCasa: res.SuperficieCubiertaCasa,
               CantidadHectareas: res.CantidadHectareas,
               DistanciaPavimento: res.DistanciaPavimento,
               SuperficieLocal: res.SuperficieLocal,
               ReferenciaCercana: res.ReferenciaCercana,
               AntiguedadComercio: res.AntiguedadComercio,
               RecaudacionMensual: res.RecaudacionMensual,
               CantidadOficinas: res.CantidadOficinas,
               AnchoEntrada: res.AnchoEntrada,
               AltoEntrada: res.AltoEntrada,
               CantidadColumnas: res.CantidadColumnas,
               CantidadNaves: res.CantidadNaves,
               AlturaTecho: res.AlturaTecho,
               Detalle: res.Detalle,
               TipoBien: res.TipoBien,


               //Checks
               AptoCredito: res.AptoCredito == "1" ? true : false,
               AptoProfesional: res.AptoProfesional == "1" ? true : false,
               CocheraOptativa: res.CocheraOptativa == "1" ? true : false,
               PropiedadOcupada: res.PropiedadOcupada == "1" ? true : false,
               Generales_PermiteMascotas: res.Generales_PermiteMascotas == "1" ? true : false,
               Generales_SeguroCaucion: res.Generales_SeguroCaucion == "1" ? true : false,
               Baulera: res.Baulera == "1" ? true : false,
               Vivienda: res.Vivienda == "1" ? true : false,
               TerrenoPropio: res.TerrenoPropio == "1" ? true : false,
               Vidriera: res.Vidriera == "1" ? true : false,
               EnEdificio: res.EnEdificio == "1" ? true : false,
               Demolicion: res.Demolicion == "1" ? true : false,
               FondoIrregular: res.FondoIrregular == "1" ? true : false,
               FrenteIrregular: res.FrenteIrregular == "1" ? true : false,
               LateralDerechoIrregular: res.LateralDerechoIrregular == "1" ? true : false,
               LateralIzquierdoIrregular: res.LateralIzquierdoIrregular == "1" ? true : false,
               Reciclado: res.Reciclado == "1" ? true : false,
               Ganaderia: res.Ganaderia == "1" ? true : false,
               Agricultura: res.Agricultura == "1" ? true : false,
               CasaPrincipal: res.CasaPrincipal == "1" ? true : false,
               CasaCaseros: res.CasaCaseros == "1" ? true : false,
               Local: res.Local == "1" ? true : false,
               VentaMercaderia: res.VentaMercaderia == "1" ? true : false,
               GeneradorPropio: res.GeneradorPropio == "1" ? true : false,


               //Selects
               fk_Disposicion: res.fk_Disposicion,
               fk_Orientacion: res.fk_Orientacion,
               fk_TipoBalcon: res.fk_TipoBalcon,
               fk_TipoExpensas: res.fk_TipoExpensas,
               fk_TipoVista: res.fk_TipoVista,
               fk_TipoCosta: res.fk_TipoCosta,
               fk_TipoTecho: res.fk_TipoTecho,
               fk_TipoPiso: res.fk_TipoPiso,
               fk_TipoPendiente: res.fk_TipoPendiente,
               fk_TipoCobertura: res.fk_TipoCobertura,
               fk_TipoCoche: res.fk_TipoCoche,
               fk_TipoAcceso: res.fk_TipoAcceso,
               fk_TipoBano: res.fk_TipoBano,
               fk_TipoAscensor: res.fk_TipoAscensor,
               fk_TipoTechoIndustrial: res.fk_TipoTechoIndustrial,
               fk_TipoCalefaccion: res.fk_TipoCalefaccion,
               fk_TipoPorton: res.fk_TipoPorton

            });

            //Recorremos los arrays para saber que item está seleccionado
            //Obtenemos y llenamos los selects de Ambientes
            if (this.vista.ambientes) {
               this.vista.ambientes.forEach(element => {
                  element.selected = res[element.variableName] == "1" ? true : false;
               });
            }

            //Obtenemos y llenamos los selects de Instalaciones
            if (this.vista.instalaciones) {
               this.vista.instalaciones.forEach(element => {
                  element.selected = res[element.variableName] == "1" ? true : false;
               });
            }


            //Obtenemos y llenamos los selects de Servicios
            if (this.vista.servicios) {
               this.vista.servicios.forEach(element => {
                  element.selected = res[element.variableName] == "1" ? true : false;
               });
            }

            //Obtenemos y llenamos los selects de Edificios
            if (this.vista.edificio) {
               //Servicios
               this.vista.edificio.servicios.forEach(element => {
                  element.selected = res[element.variableName] == "1" ? true : false;
               });
            }
            this.loading = false;
         });

      } else {
         this.loading = false;
      }


   }

   getDataForm() {
      //Creamos el objeto que vamos a llenar totalmente vacio
      let obj: IPublicacion = {} as IPublicacion;

      //Creamos un objeto con los valores del formulario 1
      let data1 = this.formOne.value;

      //Asignamos los datos del 1er Step
      obj.titulo = data1.titulo;
      obj.fk_estado_publicacion = data1.fk_estado_publicacion;
      obj.descipcion = data1.descipcion;
      obj.fk_idTipoPropiedad = data1.fk_idTipoPropiedad;
      obj.esUnaOportunidad = +data1.esUnaOportunidad;
      obj.esUnaNovedad = +data1.esUnaNovedad;
      obj.aparece_en_galeria = +data1.aparece_en_galeria;

      //Asignamos los datos del 2do Step
      this.imageGalery ? obj.imagen_para_galeria = this.imageGalery : null;
      this.image1 ? obj.imagen1 = this.image1 : null;
      this.image2 ? obj.imagen2 = this.image2 : null;
      this.image3 ? obj.imagen3 = this.image3 : null;
      this.image4 ? obj.imagen4 = this.image4 : null;
      this.image5 ? obj.imagen5 = this.image5 : null;
      this.image6 ? obj.imagen6 = this.image6 : null;
      this.image7 ? obj.imagen7 = this.image7 : null;

      //Asignamos los datos del 3er Step
      //Obetenemos el objeto del 3er formulario
      let data3 = this.formThree.value;
      //Obtenemos la data de Datos Generales
      //Asignamos el tipo de unidad
      switch (obj.fk_idTipoPropiedad) {
         //Asignamos el tipo de unidad segun el tipo de propiedad seleccionado
         case 1: //Departamento
            obj.fk_TipoUnidadDepartamento = data3.tipoDeUnidad;
            break;
         case 3: //Casa
            obj.fk_TipoUnidadCasa = data3.tipoDeUnidad;
            break;
         case 4: //Quinta
            obj.fk_TipoUnidadCasa = data3.tipoDeUnidad;
            break;
         case 5: //Cochera
            obj.fk_TipoCochera = data3.tipoDeUnidad;
            break;
         case 6: //Local
            obj.fk_TipoLocal = data3.tipoDeUnidad;
            break;
         case 7: //Hotel
            obj.fk_TipoHotel = data3.tipoDeUnidad;
            break;
         case 8: //Terreno
            obj.fk_TipoTerreno = data3.tipoDeUnidad;
            break;
         case 10: //Campo
            obj.fk_TipoCampo = data3.tipoDeUnidad;
            break;
         case 11: //Fondo de Comercio
            obj.fk_TipoFondoComercio = data3.tipoDeUnidad;
            break;

         case 2: //Departamento Tipo Casa
         case 9: //Oficina
         case 12: //Galpón
         case 13: //Negocio Especial
         default: //Cuando se ingrese algo desconocido
            //No posee tipo de unidad
            break;
      }

      obj.fk_idTipoOperaion = data3.fk_idTipoOperaion;
      obj.precio = data3.precio;
      obj.fk_idMonedas = data3.fk_idMonedas;
      obj.no_publicar_precio_inter = data3.no_publicar_precio_inter ? 1 : 0;
      obj.fk_Estado = data3.fk_Estado;

      //Obtenemos la data de comision
      obj.comision = data3.comision;

      //Obtenemos la data de Ubicacion
      obj.fk_Direccion_Pais_Id = 1; //Por Default Argentina
      obj.fk_Direccion_Provincia_Id = data3.fk_Direccion_Provincia_Id;
      obj.fk_Direccion_Partido_Id = data3.fk_Direccion_Partido_Id;
      obj.fk_Direccion_Localidad_Id = data3.fk_Direccion_Localidad_Id;
      obj.fk_Direccion_Ciudad_Id = data3.fk_Direccion_Ciudad_Id ? data3.fk_Direccion_Ciudad_Id : '';
      obj.fk_Direccion_Barrio_Id = data3.fk_Direccion_Barrio_Id ? data3.fk_Direccion_Barrio_Id : '';
      obj.fk_Direccion_SubBarrio_Id = data3.fk_Direccion_SubBarrio_Id ? data3.fk_Direccion_SubBarrio_Id : '';
      obj.Direccion_Nombrecalle = data3.Direccion_Nombrecalle ? data3.Direccion_Nombrecalle : '';
      obj.Direccion_Numero = data3.Direccion_Numero ? data3.Direccion_Numero : '';
      obj.Direccion_Piso = data3.Direccion_Piso ? data3.Direccion_Piso : '';
      obj.Direccion_Departamento = data3.Direccion_Departamento ? data3.Direccion_Departamento : '';
      obj.Direccion_Coordenadas_Latitud = data3.Direccion_Coordenadas_Latitud ? data3.Direccion_Coordenadas_Latitud : '';
      obj.Direccion_Coordenadas_Longitud = data3.Direccion_Coordenadas_Longitud ? data3.Direccion_Coordenadas_Longitud : '';

      //Llenamos las caracteristicas
      //Inputs
      obj.LongitudFrente = data3.LongitudFrente ? data3.LongitudFrente : '';
      obj.LongitudFondo = data3.LongitudFondo ? data3.LongitudFondo : '';
      obj.Antiguedad = data3.Antiguedad ? data3.Antiguedad : '';
      obj.SuperficieCubierta = data3.SuperficieCubierta ? data3.SuperficieCubierta : '';
      obj.SuperficieDescubierta = data3.SuperficieDescubierta ? data3.SuperficieDescubierta : '';
      obj.CantidadCocheras = data3.CantidadCocheras ? data3.CantidadCocheras : '';
      obj.Expensas = data3.Expensas ? data3.Expensas : '';
      obj.CantidadBanos = data3.CantidadBanos ? data3.CantidadBanos : '';
      obj.CantidadAmbientes = data3.CantidadAmbientes ? data3.CantidadAmbientes : '';
      obj.CantidadDormitorios = data3.CantidadDormitorios ? data3.CantidadDormitorios : '';
      obj.CantidadPlantas = data3.CantidadPlantas ? data3.CantidadPlantas : '';
      obj.SuperficieTerreno = data3.SuperficieTerreno ? data3.SuperficieTerreno : '';
      obj.Largo = data3.Largo ? data3.Largo : '';
      obj.Ancho = data3.Ancho ? data3.Ancho : '';
      obj.Altura = data3.Altura ? data3.Altura : '';
      obj.MontoExpensas = data3.MontoExpensas ? data3.MontoExpensas : '';
      obj.MetrosDeLaEsquina = data3.MetrosDeLaEsquina ? data3.MetrosDeLaEsquina : '';
      obj.UltimaActividad = data3.UltimaActividad ? data3.UltimaActividad : '';
      obj.GaleriaShopping = data3.GaleriaShopping ? data3.GaleriaShopping : '';
      obj.SuperficiePlaya = data3.SuperficiePlaya ? data3.SuperficiePlaya : '';
      obj.SuperficieDeposito = data3.SuperficieDeposito ? data3.SuperficieDeposito : '';
      obj.CantidadPisos = data3.CantidadPisos ? data3.CantidadPisos : '';
      obj.HabitacionesPorPiso = data3.HabitacionesPorPiso ? data3.HabitacionesPorPiso : '';
      obj.CantidadPersonal = data3.CantidadPersonal ? data3.CantidadPersonal : '';
      obj.RentabilidadAnual = data3.RentabilidadAnual ? data3.RentabilidadAnual : '';
      obj.CantidadHabitaciones = data3.CantidadHabitaciones ? data3.CantidadHabitaciones : '';
      obj.CantidadEstrellas = data3.CantidadEstrellas ? data3.CantidadEstrellas : '';
      obj.CantidadPlazas = data3.CantidadPlazas ? data3.CantidadPlazas : '';
      obj.CantidadCubiertos = data3.CantidadCubiertos ? data3.CantidadCubiertos : '';
      obj.SuperficieTotal = data3.SuperficieTotal ? data3.SuperficieTotal : '';
      obj.SuperficieConstruible = data3.SuperficieConstruible ? data3.SuperficieConstruible : '';
      obj.MedidaLinealDerecha = data3.MedidaLinealDerecha ? data3.MedidaLinealDerecha : '';
      obj.MedidaLinealIzquierda = data3.MedidaLinealIzquierda ? data3.MedidaLinealIzquierda : '';
      obj.FOT = data3.FOT ? data3.FOT : '';
      obj.Zonificacion = data3.Zonificacion ? data3.Zonificacion : '';
      obj.SuperficiePlanta = data3.SuperficiePlanta ? data3.SuperficiePlanta : '';
      obj.DepartamentosPorPiso = data3.DepartamentosPorPiso ? data3.DepartamentosPorPiso : '';
      obj.SuperficieOficina = data3.SuperficieOficina ? data3.SuperficieOficina : '';
      obj.SuperficieCubiertaCasa = data3.SuperficieCubiertaCasa ? data3.SuperficieCubiertaCasa : '';
      obj.CantidadHectareas = data3.CantidadHectareas ? data3.CantidadHectareas : '';
      obj.DistanciaPavimento = data3.DistanciaPavimento ? data3.DistanciaPavimento : '';
      obj.SuperficieLocal = data3.SuperficieLocal ? data3.SuperficieLocal : '';
      obj.ReferenciaCercana = data3.ReferenciaCercana ? data3.ReferenciaCercana : '';
      obj.AntiguedadComercio = data3.AntiguedadComercio ? data3.AntiguedadComercio : '';
      obj.CantidadOficinas = data3.CantidadOficinas ? data3.CantidadOficinas : '';
      obj.RecaudacionMensual = data3.RecaudacionMensual ? data3.RecaudacionMensual : '';
      obj.AnchoEntrada = data3.AnchoEntrada ? data3.AnchoEntrada : '';
      obj.AltoEntrada = data3.AltoEntrada ? data3.AltoEntrada : '';
      obj.CantidadColumnas = data3.CantidadColumnas ? data3.CantidadColumnas : '';
      obj.CantidadNaves = data3.CantidadNaves ? data3.CantidadNaves : '';
      obj.AlturaTecho = data3.AlturaTecho ? data3.AlturaTecho : '';
      obj.Detalle = data3.Detalle ? data3.Detalle : '';
      obj.TipoBien = data3.TipoBien ? data3.TipoBien : '';


      //Checks
      obj.AptoCredito = data3.AptoCredito ? 1 : 0;
      obj.AptoProfesional = data3.AptoProfesional ? 1 : 0;
      obj.CocheraOptativa = data3.CocheraOptativa ? 1 : 0;
      obj.PropiedadOcupada = data3.PropiedadOcupada ? 1 : 0;
      obj.Generales_PermiteMascotas = data3.Generales_PermiteMascotas ? 1 : 0;
      obj.Generales_SeguroCaucion = data3.Generales_SeguroCaucion ? 1 : 0;
      obj.Baulera = data3.Baulera ? 1 : 0;
      obj.Vivienda = data3.Vivienda ? 1 : 0;
      obj.TerrenoPropio = data3.TerrenoPropio ? 1 : 0;
      obj.Vidriera = data3.Vidriera ? 1 : 0;
      obj.EnEdificio = data3.EnEdificio ? 1 : 0;
      obj.Demolicion = data3.Demolicion ? 1 : 0;
      obj.FondoIrregular = data3.FondoIrregular ? 1 : 0;
      obj.FrenteIrregular = data3.FrenteIrregular ? 1 : 0;
      obj.LateralDerechoIrregular = data3.LateralDerechoIrregular ? 1 : 0;
      obj.LateralIzquierdoIrregular = data3.LateralIzquierdoIrregular ? 1 : 0;
      obj.Ganaderia = data3.Ganaderia ? 1 : 0;
      obj.Agricultura = data3.Agricultura ? 1 : 0;
      obj.CasaPrincipal = data3.CasaPrincipal ? 1 : 0;
      obj.CasaCaseros = data3.CasaCaseros ? 1 : 0;
      obj.PropiedadOcupada = data3.PropiedadOcupada ? 1 : 0;
      obj.Local = data3.Local ? 1 : 0;
      obj.VentaMercaderia = data3.VentaMercaderia ? 1 : 0;
      obj.GeneradorPropio = data3.GeneradorPropio ? 1 : 0;


      //Selects
      obj.fk_Disposicion = data3.fk_Disposicion ? data3.fk_Disposicion : '';
      obj.fk_Orientacion = data3.fk_Orientacion ? data3.fk_Orientacion : '';
      obj.fk_TipoBalcon = data3.fk_TipoBalcon ? data3.fk_TipoBalcon : '';
      obj.fk_TipoExpensas = data3.fk_TipoExpensas ? data3.fk_TipoExpensas : '';
      obj.fk_TipoVista = data3.fk_TipoVista ? data3.fk_TipoVista : '';
      obj.fk_TipoCosta = data3.fk_TipoCosta ? data3.fk_TipoCosta : '';
      obj.fk_TipoTecho = data3.fk_TipoTecho ? data3.fk_TipoTecho : '';
      obj.fk_TipoPendiente = data3.fk_TipoPendiente ? data3.fk_TipoPendiente : '';
      obj.fk_TipoCobertura = data3.fk_TipoCobertura ? data3.fk_TipoCobertura : '';
      obj.fk_TipoCoche = data3.fk_TipoCoche ? data3.fk_TipoCoche : '';
      obj.fk_TipoAcceso = data3.fk_TipoAcceso ? data3.fk_TipoAcceso : '';
      obj.fk_TipoBano = data3.fk_TipoBano ? data3.fk_TipoBano : '';
      obj.fk_TipoAscensor = data3.fk_TipoAscensor ? data3.fk_TipoAscensor : '';
      obj.fk_TipoTechoIndustrial = data3.fk_TipoTechoIndustrial ? data3.fk_TipoTechoIndustrial : '';
      obj.fk_TipoPorton = data3.fk_TipoPorton ? data3.fk_TipoPorton : '';
      obj.fk_TipoCalefaccion = data3.fk_TipoCalefaccion ? data3.fk_TipoCalefaccion : '';

      //Obtenemos y llenamos los selects de Ambientes
      if (this.vista.ambientes) {
         this.vista.ambientes.forEach(element => {
            obj[element.variableName] = element.selected ? 1 : 0;
            element.isMedidas ? obj["Medidas_" + element.variableName] = element.medidas : null;
         });
      }


      //Obtenemos y llenamos los selects de Instalaciones
      if (this.vista.instalaciones) {
         this.vista.instalaciones.forEach(element => {
            obj[element.variableName] = element.selected ? 1 : 0;
         });
      }


      //Obtenemos y llenamos los selects de Servicios
      if (this.vista.servicios) {
         this.vista.servicios.forEach(element => {
            obj[element.variableName] = element.selected ? 1 : 0;
         });
      }

      //Obtenemos y llenamos los selects de Edificios
      if (this.vista.edificio) {
         //Servicios
         this.vista.edificio.servicios.forEach(element => {
            obj[element.variableName] = element.selected ? 1 : 0;
         });
      }
      return obj;

   }

   changeApareceEnGaleria() {
      if (this.formOne.value.aparece_en_galeria == '1') {
         this.formTwo.controls['imageGalery'].enable();
      } else {
         this.formTwo.controls['imageGalery'].disable();
      }

   }

   changeTipoPropiedad(event) {
      //Validamos que tipo de propiedad se selecciona para cargar los tipos de unidad que se van a mostrar
      //Segun la api de argen prod https://inmuebles.atlassian.net/wiki/spaces/PUB/pages/39813246/3.2.2.3+Objeto+Propiedad
      switch (event.value) {
         case 1: //Departamento
            this.service.getTipoUnidadDepartamento().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoUnidadDepartamento, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Departamento;
            break;
         case 2: //Departamento Tipo Casa
            let array2 = [];
            array2.push({ id: '0', descripcion: "No Aplica" });
            this.arrayTipoDeUnidad = array2;
            this.vista = DataByTipoPropiedad.DepartamentoTipoCasa;
            break;
         case 3: //Casa
            this.service.getTipoUnidadCasa().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoUnidadCasa, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Casa;
            break;
         case 4: //Quinta
            this.service.getTipoUnidadCasa().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoUnidadCasa, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Quinta;
            break;
         case 5: //Cochera
            this.service.getTipoCochera().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoCochera, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Cochera;
            break;
         case 6: //Local
            this.service.getTipoLocal().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoLocal, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Local;
            break;
         case 7: //Hotel
            this.service.getTipoHotel().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoHotel, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Hotel;
            break;
         case 8: //Terreno
            this.service.getTipoTerreno().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoTerreno, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Terreno;
            break;
         case 9: //Oficina
            let array9 = [];
            array9.push({ id: '0', descripcion: "No Aplica" });
            this.arrayTipoDeUnidad = array9;
            this.vista = DataByTipoPropiedad.Oficina;
            break;
         case 10: //Campo
            this.service.getTipoCampo().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoCampo, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.Campo;
            break;
         case 11: //Fondo de Comercio
            this.service.getTipoFondoComercio().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoFondoComercio, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            this.vista = DataByTipoPropiedad.FondoComercio;
            break;

         case 12: //Galpón
            let array12 = [];
            array12.push({ id: '0', descripcion: "No Aplica" });
            this.arrayTipoDeUnidad = array12;
            this.vista = DataByTipoPropiedad.Galpon;
            break;
         case 13: //Negocio Especial
            let array13 = [];
            array13.push({ id: '0', descripcion: "No Aplica" });
            this.arrayTipoDeUnidad = array13;
            this.vista = DataByTipoPropiedad.NegocioEspecial;
            break;
         default: //Cuando se ingrese algo desconocido
            //No posee tipo de unidad
            this.arrayTipoDeUnidad = [{ id: 0, descripcion: "Otro" }]
            break;

      }
      //Luego de cambiar el array eliminamos el posible valor seleccionado
      this.formThree.controls['tipoDeUnidad'].setValue(null);
      //Limpiamos los selects
      //Recorremos los arrays para saber que item está seleccionado
      //Obtenemos y llenamos los selects de Ambientes
      if (this.vista.ambientes) {
         this.vista.ambientes.forEach(element => {
            element.selected = false;
         });
      }

      //Obtenemos y llenamos los selects de Instalaciones
      if (this.vista.instalaciones) {
         this.vista.instalaciones.forEach(element => {
            element.selected = false;
         });
      }


      //Obtenemos y llenamos los selects de Servicios
      if (this.vista.servicios) {
         this.vista.servicios.forEach(element => {
            element.selected = false;
         });
      }

      //Obtenemos y llenamos los selects de Edificios
      if (this.vista.edificio && this.vista.edificio.servicios) {
         //Servicios
         this.vista.edificio.servicios.forEach(element => {
            element.selected = false;
         });
      }

   }

   onFileChange(event, section?: string) {
      if (event.target.files && event.target.files.length) {
         const fileTo: File = event.target.files[0];

         //Validamos el tipo de archivo
         if (!fileTo.type.includes('image/png')
            && !fileTo.type.includes('image/jpg')
            && !fileTo.type.includes('image/jpeg')) {
            this.alertService.msg('ERR', 'Error:', 'El archivo no es admitido o no es una imagen');
            return;
         }

         //Validamos el tamaño del archivo
         if (fileTo.size > 1250000) {
            this.alertService.msg('ERR', 'Error:', 'El archivo es muy pesado, peso máximo 1Mb');
            return;
         }

         //Obtenemos un fakeURL para mostrar un preview
         var reader = new FileReader();
         reader.readAsDataURL(event.target.files[0]);
         //cargar imagenes
         switch (section) {
            case "imageGalery":
               //Asignamos la imagen
               this.imageGalery = fileTo;
               //Asignamos el fakeUrl
               reader.onload = (event) => {
                  this.formTwo.controls['imageGalery'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image1":
               this.image1 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image1'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image2":
               this.image2 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image2'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image3":
               this.image3 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image3'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image4":
               this.image4 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image4'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image5":
               this.image5 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image5'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image6":
               this.image6 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image6'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image7":
               this.image7 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image7'].setValue((<FileReader>event.target).result);
               }
               break;
            default:
               break;
         }
      }
   }


   reloadPartidos(event) {
      this.formThree.controls['fk_Direccion_Partido_Id'].setValue('');
      if (event.value >= 0) {
         this.service.getPartidos(event.value).then((resp: any) => {
            this.arrayPartido = resp.Partidos;
         });
      }
   }

   reloadLocalidades(event) {
      this.formThree.controls['fk_Direccion_Localidad_Id'].setValue('');
      if (event.value >= 0) {
         this.service.getLocalidades(event.value).then((resp: any) => {
            this.arrayLocalidad = resp.Localidades;
         });
      }
   }

   reloadBarrios(event) {
      this.formThree.controls['fk_Direccion_Barrio_Id'].setValue('');
      if (event.value >= 0) {
         this.service.getBarrios(event.value).then((resp: any) => {
            this.arrayBarrio = resp.Barrios;
         });
      }
   }

   reloadSubBarrios(event) {
      this.formThree.controls['fk_Direccion_SubBarrio_Id'].setValue('');
      if (event.value >= 0) {
         this.service.getSubBarrios(event.value).then((resp: any) => {
            this.arraySubBarrio = resp.SubBarrios;
         });
      }
   }

   publicar() {
      this.inPromise = true
      //Obtenemos el objeto con los datos
      let obj = this.getDataForm();
      //Parseamos el objeto a FORM DATA
      let formData: FormData = new FormData();
      let keys = Object.keys(obj);
      
      for (let index = 0; index < keys.length; index++) {
         const element = keys[index];
         formData.append(element, obj[element]);
      }
      //Registramos el objeto
      this.service.addPropiedad(formData).then((resp: any) => {
         this.inPromise = false
         this.alertService.msg(
            "OK",
            "Registro",
            resp.msj
         );
         this.formOne.reset();
         this.formTwo.reset();
         this.formThree.reset();
         this.router.navigate(['/gestionar-publicaciones']);

      }).catch(e => {
         console.error(e);
         this.alertService.msg("ERR", "ERROR", "Error al publicar los datos.");
      });
   }

   modificar() {
      this.inPromise = true
      //Obtenemos el objeto con los datos
      let obj = this.getDataForm();
      //Parseamos el objeto a FORM DATA
      let formData: FormData = new FormData();
      let keys = Object.keys(obj)
      for (let index = 0; index < keys.length; index++) {
         const element = keys[index];
         formData.append(element, obj[element]);
      }
      //Registramos el objeto
      this.service.editPropiedad(formData, this.id).then((resp: any) => {
         this.inPromise = false
         this.alertService.msg(
            "OK",
            "Modificación",
            resp.msj
         );

      }).catch(e => {
         console.error(e);
         this.alertService.msg("ERR", "ERROR", "Error al modificar los datos.");
      });
   }

   getTipoDeUnidad(obj) {
      switch (obj.fk_idTipoPropiedad) {
         //Asignamos el tipo de unidad segun el tipo de propiedad seleccionado
         case 1: //Departamento
            return obj.fk_TipoUnidadDepartamento;
         case 3: //Casa
            return obj.fk_TipoUnidadCasa;
         case 4: //Quinta
            return obj.fk_TipoUnidadCasa
         case 5: //Cochera
            return obj.fk_TipoCochera
         case 6: //Local
            return obj.fk_TipoLocal
         case 7: //Hotel
            return obj.fk_TipoHotel
         case 8: //Terreno
            return obj.fk_TipoTerreno
         case 10: //Campo
            return obj.fk_TipoCampo
         case 11: //Fondo de Comercio
            return obj.fk_TipoFondoComercio

         case 2: //Departamento Tipo Casa
         case 9: //Oficina
         case 12: //Galpón
         case 13: //Negocio Especial
         default: //Cuando se ingrese algo desconocido
            //No posee tipo de unidad
            return 0;
      }
   }

   show() { }

   delete() { }


}